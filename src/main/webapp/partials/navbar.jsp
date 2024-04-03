<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c"%>

<nav class="navbar navbar-expand-lg  navbar-light bg-danger p-2" >
  <div class="container-fluid ">
    <a class="navbar-brand text-light" href="./home">Gestion Elena </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-light " aria-current="page" href="#">Pedidos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light " href="./products">Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light " href="#">Borrados</a>
        </li>

      </ul>
      <span class="navbar-text dropdown px-3" >

              <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <c:out value="${user.getName().toUpperCase()}"></c:out>
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/GestionPedidos/logout">Salir</a></li>
              </ul>

      </span>
    </div>
  </div>
</nav>