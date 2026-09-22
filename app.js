/* AURELIA · Tienda de lujo · © Diana Trujillo */
(function(){
  'use strict';
  const $=id=>document.getElementById(id);
  const U='https://images.unsplash.com/', Q='?q=80&w=800&auto=format&fit=crop';
  const FALLBACK=U+'photo-1441986300917-64674bd600d8'+Q;
  let PRODUCTS=[
    {id:1,nombre:'Abrigo Milano',categoria:'elegance',precio:289,foto_url:U+'photo-1539109136881-3be0616acf4b'+Q,foto_alt:'Abrigo celeste elegante'},
    {id:2,nombre:'Conjunto Urban Sol',categoria:'urban',precio:129,foto_url:U+'photo-1515886657613-9f3515b0c78f'+Q,foto_alt:'Conjunto amarillo'},
    {id:3,nombre:'Poncho Artesanal',categoria:'artesanal',precio:95,foto_url:U+'photo-1434389677669-e08b4cac3105'+Q,foto_alt:'Poncho tejido'},
    {id:4,nombre:'Vestido Riviera',categoria:'elegance',precio:149,foto_url:U+'photo-1469334031218-e382a71b716b'+Q,foto_alt:'Vestido editorial'},
    {id:5,nombre:'Set Street Chic',categoria:'urban',precio:119,foto_url:U+'photo-1529139574466-a303027c1d8b'+Q,foto_alt:'Look urbano'},
    {id:6,nombre:'Colección Esencial',categoria:'artesanal',precio:59,foto_url:U+'photo-1490481651871-ab68de25d43d'+Q,foto_alt:'Prendas esenciales'}
  ];
  const CAT={elegance:'👑 Elegance',urban:'🌆 Urban',artesanal:'🧶 Artesanal'};
  const money=v=>'$'+Number(v).toFixed(2);

  /* Loader + menú */
  window.addEventListener('load',()=>{const l=$('loader');l.style.opacity=0;setTimeout(()=>l.remove(),650);});
  setTimeout(()=>{const l=$('loader');if(l){l.style.opacity=0;setTimeout(()=>l.remove(),650);}},2500);
  $('menu').onclick=()=>document.querySelector('.topbar').classList.toggle('open');

  /* Productos: API PHP/MySQL con respaldo local */
  fetch('api/productos.php').then(r=>r.json()).then(d=>{
    if(d.ok&&d.productos&&d.productos.length){PRODUCTS=d.productos;}
    paint('all');
  }).catch(()=>paint('all'));

  function paint(f){
    $('grid').innerHTML=PRODUCTS.filter(p=>f==='all'||p.categoria===f).map(p=>
      `<article class="pcard"><div class="foto"><img src="${p.foto_url}" alt="${p.foto_alt||p.nombre}" loading="lazy" onerror="this.onerror=null;this.src='${FALLBACK}'"><span class="shine"></span></div>
      <div class="body"><p class="cat">${CAT[p.categoria]||p.categoria}</p><h3>${p.nombre}</h3>
      <div class="row"><span class="price">${money(p.precio)}</span><button class="btn gold" data-add="${p.id}">Añadir 👜</button></div></div></article>`).join('');
    document.querySelectorAll('[data-add]').forEach(b=>b.onclick=()=>add(+b.dataset.add));
  }
  document.querySelectorAll('.chip').forEach(c=>c.onclick=()=>{
    document.querySelectorAll('.chip').forEach(x=>x.classList.remove('active'));
    c.classList.add('active');paint(c.dataset.f);});

  /* Carrito */
  const K='maison_cart_v1';
  let cart=[]; try{cart=JSON.parse(localStorage.getItem(K))||[];}catch{cart=[];}
  function save(){localStorage.setItem(K,JSON.stringify(cart));}
  function add(id){const it=cart.find(x=>x.id===id);it?it.qty++:cart.push({id,qty:1});save();render();toast('✨ Añadido al carrito');openDrawer();}
  function render(){
    const n=cart.reduce((s,x)=>s+x.qty,0);$('cart-n').textContent=n;
    const box=$('drawer-items');
    box.innerHTML=cart.map(x=>{const p=PRODUCTS.find(y=>y.id==x.id);if(!p)return'';
      return`<div class="ditem"><img src="${p.foto_url}" alt="" onerror="this.onerror=null;this.src='${FALLBACK}'">
      <div style="flex:1"><strong>${p.nombre}</strong><br><small>${money(p.precio)} c/u</small><br>
      <button data-dec="${x.id}">−</button> ${x.qty} <button data-inc="${x.id}">+</button></div>
      <div><strong>${money(p.precio*x.qty)}</strong><br><button data-del="${x.id}">✕</button></div></div>`;}).join('')||'<p>Tu carrito está vacío… por ahora. 👑</p>';
    $('drawer-total').textContent=money(cart.reduce((s,x)=>{const p=PRODUCTS.find(y=>y.id==x.id);return s+(p?p.precio*x.qty:0);},0));
    document.querySelectorAll('[data-inc]').forEach(b=>b.onclick=()=>{cart.find(x=>x.id==b.dataset.inc).qty++;save();render();});
    document.querySelectorAll('[data-dec]').forEach(b=>b.onclick=()=>{const it=cart.find(x=>x.id==b.dataset.dec);it.qty--;if(it.qty<1)cart=cart.filter(x=>x!==it);save();render();});
    document.querySelectorAll('[data-del]').forEach(b=>b.onclick=()=>{cart=cart.filter(x=>x.id!=b.dataset.del);save();render();});
  }
  function openDrawer(){$('drawer').classList.add('open');}
  $('btn-cart').onclick=openDrawer;
  $('btn-close').onclick=()=>$('drawer').classList.remove('open');

  /* Checkout → pedido.php */
  $('btn-checkout').onclick=()=>{
    if(!cart.length){toast('Tu carrito está vacío 👑');return;}
    const items=cart.map(x=>{const p=PRODUCTS.find(y=>y.id==x.id);return `${x.qty}× ${p.nombre}`;}).join(', ');
    $('p-items').value=items;
    $('p-total').value=cart.reduce((s,x)=>{const p=PRODUCTS.find(y=>y.id==x.id);return s+p.precio*x.qty;},0).toFixed(2);
    $('modal').classList.add('open');
  };
  $('btn-cancel').onclick=()=>$('modal').classList.remove('open');
  $('form-pedido').addEventListener('submit',e=>{
    if(!window.fetch)return;
    e.preventDefault();
    fetch('pedido.php',{method:'POST',body:new FormData(e.target)}).then(r=>r.json()).then(d=>{
      $('ped-ok').textContent=(d.ok?'✅ ':'⚠️ ')+d.msg;
      if(d.ok){cart=[];save();render();}
    }).catch(()=>{$('ped-ok').textContent='⚠️ Sin conexión.';});
  });

  /* Newsletter → newsletter.php */
  $('form-news').addEventListener('submit',e=>{
    const em=$('news-email').value.trim();
    if(!/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(em)){$('news-ok').textContent='⚠️ Escribe un correo válido.';e.preventDefault();return;}
    if(!window.fetch)return;
    e.preventDefault();
    fetch('newsletter.php',{method:'POST',body:new FormData(e.target)}).then(r=>r.json()).then(d=>{
      $('news-ok').textContent=(d.ok?'✅ ':'⚠️ ')+d.msg;
    }).catch(()=>{$('news-ok').textContent='⚠️ Sin conexión.';});
  });

  /* Contadores */
  const io=new IntersectionObserver(es=>es.forEach(x=>{
    if(!x.isIntersecting)return;io.unobserve(x.target);
    const el=x.target,end=+el.dataset.n;let t0=null;
    (function step(t){t0=t0||t;const p=Math.min(1,(t-t0)/1400);
      el.textContent=Math.round(end*p).toLocaleString();if(p<1)requestAnimationFrame(step);})(performance.now());
  }),{threshold:.5});
  document.querySelectorAll('.count').forEach(el=>io.observe(el));

  /* Slider opiniones */
  const slides=[...document.querySelectorAll('.slide')],dots=[...document.querySelectorAll('.dot')];let si=0,tm;
  function go(i){si=(i+slides.length)%slides.length;
    slides.forEach((s,k)=>s.classList.toggle('active',k===si));
    dots.forEach((d,k)=>d.classList.toggle('active',k===si));}
  function auto(){clearInterval(tm);tm=setInterval(()=>go(si+1),4500);}
  dots.forEach((d,i)=>d.onclick=()=>{go(i);auto();});auto();

  /* Toast */
  let tt;function toast(m){const t=$('toast');t.textContent=m;t.classList.add('show');clearTimeout(tt);tt=setTimeout(()=>t.classList.remove('show'),2200);}

  render();
})();
