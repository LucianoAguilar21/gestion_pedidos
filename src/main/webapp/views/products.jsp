<%@page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c"%>
<!DOCTYPE html>
<html lang="es">
<head>
    <jsp:include page="../partials/head.jsp"></jsp:include>
    <title>Home</title>
    <%@ page contentType="text/html; charset=UTF-8" %>
</head>
<body>

    <c:choose>
        <c:when test="${user != null}">

            <jsp:include page="../partials/navbar.jsp" ></jsp:include>
            <div class="container">
            <c:if test="${productMsg != null}">
                <div class="text-success fs-3"> <c:out value="${productMsg}"></c:out> </div>
            </c:if>
            <c:if test="${productError != null}">
                <div class="text-danger fs-3"> <c:out value="${productError}"></c:out> </div>
            </c:if>
            <button type="button" class="btn btn-success m-3" data-bs-toggle="modal" data-bs-target="#agregarNuevoProducto">
              Agregar Nuevo Producto
            </button>
            <!-- Modal -->
            <div class="modal fade" id="agregarNuevoProducto" tabindex="-1" aria-labelledby="agregarNuevoProductoLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Producto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                   <form action="./products" method="POST">
                      <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Producto(nombre):</label>
                        <input type="text" class="form-control"  name="productName" id="productName" placeholder="Nombre del producto" required>
                      </div>
                      <div class="mb-3">
                        <label for="message-text" class="col-form-label" >Precio:</label>
                        <input type="number" class="form-control" id="productPrice" name="productPrice" placeholder="0.0" required>
                      </div>


                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                      </div>
                   </form>
                   </div>
                </div>
              </div>
            </div>


            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col" class="w-25">Producto</th>
                  <th scope="col">Precio</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <c:forEach items="${products}" var="product">
                    <tr>
                        <td> <c:out value="${product.getId()}"></c:out> </td>
                        <td> <c:out value="${product.getName()}"></c:out> </td>
                        <td> <c:out value="${product.getPrice()}"></c:out> </td>
                        <td> <a class="btn btn-sm btn-primary"><i class="fa-solid fa-pen-to-square " ></i></a><a class="btn btn-sm btn-danger mx-2" data-bs-toggle="modal" data-bs-target="#${product.getId()}"> <i class="fa-solid fa-trash"></i> </a> </td>

                    </tr>
                    <!-- DELETE MODAL -->
                                <div class="modal fade" id="${product.getId()}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h3 class="text-center">¿ESTAS SEGURO DE QUE DESEA ELIMINAR ESTE PRODUCTO?</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body d-flex justify-content-center">
                                        <button type="button" class="btn btn-secondary mx-3" data-bs-dismiss="modal">Cerrar</button>
                                        <form action="./deleteProduct?id=${product.getId()}" method="POST">
                                            <button type="submit" class="btn btn-warning" >Aceptar</button>
                                        </form>
                                      </div>
                                      <div class="modal-footer">

                                      </div>
                                    </div>
                                  </div>
                                </div>
                </c:forEach>
              </tbody>
            </table>

            </div>


        </c:when>
        <c:otherwise>
            <h3 class="text-danger">Por favor ingrear al sistema</h3>
            <a href="./">Volver</a>
        </c:otherwise>
    </c:choose>

</body>
</html>