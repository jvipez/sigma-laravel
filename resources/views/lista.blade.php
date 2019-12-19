@extends('layouts.master')
@section('css')
  <link rel="stylesheet" href="/css/lista.css">
@endsection
@section('title')
Lista
@endsection
@section('main')
<div class="cont-a">
  <div class="fil-titu">
    <div class="opt-text">
      Filtros
    </div>
    <div class="fil-icon">
      <ion-icon name="options"></ion-icon>
    </div>
  </div>
  <form class="fil-sec-opt" action="list.php" method="get">
    <div class="fil-sec-titu">Tipo</div>
    <ul>
      @forelse ($vac[1] as $categoria)
        @if ($categoria->id == $vac[2])
          <a href="/lista">
          <div class="fil-delete">
            {{$vac[0][0]->categoria->nombre}} ✗
          </div>
          </a>
        @else
          <div class="fil-categoria">
            <a href="/lista/{{$categoria->id}}">{{$categoria->nombre}}</a>
          </div>
        @endif
      @empty
        <h2>No hay categorías disponibles</h2>
      @endforelse
    </ul>
  </form>
  <form class="fil-sec-opt" action="list.php" method="get">
    <div class="fil-sec-titu">Talle</div>
    <ul>
      <li><input type="radio" name="talle" value="remeras"> 34</li>
      <li><input type="radio" name="talle" value="pantal"> 36</li>
      <li><input type="radio" name="talle" value="calzado"> 38</li>
      <li><input type="radio" name="talle" value="buzos"> 40</li>
      <li><input type="radio" name="talle" value="camper"> 42</li>
      <li><input type="radio" name="talle" value="ropaint"> 44</li>
      <li><input type="radio" name="talle" value="acceso"> 46</li>
    </ul>
  </form>
</div>
<div class="cont-b">
  <div class="opciones">
    <div class="opcion">
      <div class="vista">
        <div class="vista-c">
          <a href="home.php">
            <ion-icon name="grid"></ion-icon>
          </a>
        </div>
        <div class="barra">
          |
        </div>
        <div class="vista-l">
          <a href="list.php">
            <ion-icon name="list-box"></ion-icon>
          </a>
        </div>
      </div>
    </div>
    <div class="opcion">
      <div class="opt-text">
        Ordenar
      </div>
      <div class="opt-icon">
        <ion-icon name="arrow-dropdown"></ion-icon>
      </div>
    </div>
    <div class="opcion opt-filt">
      <div class="opt-text">
        Filtrar
      </div>
      <div class="opt-icon">
        <ion-icon name="options"></ion-icon>
      </div>
    </div>
  </div>
  <section class="productos">

    @forelse ($vac[0] as $producto) {{--$vac tiene los productos(0) y las categorias(1)--}}
      <a href="/producto/{{$producto->id}}">
      <article class="producto">
        <div class="imagen-p">
          <img src="/img/macbook.jpg" alt="Macbook">
        </div>
        <div class="info-p">
          <p class="titulo-p">{{$producto['titulo']}}</p>
          @if ($producto['stock'] == null)
            <p style="text-decoration: line-through;">{{$producto['precio']}}$ ARS</p>
            <p style="color: red;">Fuera de stock</p>
          @else
            <p><b>{{$producto['precio']}}$ ARS</b>
            {{$producto['stock']}} restantes</p>
          @endif
          <label for="">{{$producto->categoria->nombre}}</label>
        </div>
        <div class="fav-p">
          <ion-icon name="heart-empty"></ion-icon>
        </div>
      </article>
      </a>

    @empty
      <p style="text-align: center;">No hay productos que coincidan con la busqueda. Lo sentimos</p>
    @endforelse

  </section>
</div>
@endsection
