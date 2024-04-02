<%@page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c"%>
<!DOCTYPE html>
<html lang="es">
<head>
    <jsp:include page="partials/head.jsp"></jsp:include>
    <title>Iniciar Sesion</title>
    <%@ page contentType="text/html; charset=UTF-8" %>
</head>
<body>

    <c:choose>
        <c:when test="${flash == null && invalidUser != null}">
            <c:set var="accordion1" value="" />
            <c:set var="accordion2" value="show" />
        </c:when>
        <c:otherwise>
            <c:set var="accordion1" value="show" />
            <c:set var="accordion2" value="" />
        </c:otherwise>
    </c:choose>

    <div class="container mt-4 col-lg-4">
        <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Iniciar Sesion
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse ${accordion1}" data-bs-parent="#accordionExample">
              <div class="accordion-body">

                    <div class="card-body ">
                        <form class="form-sign" action="login" method="POST">
                               <div class="form-group text-center" >
                                    <h3>Iniciar Sesión</h3>
                               </div>
                               <div class="form-group">
                                    <label>Usuario:</label>

                                            <input type="text" name="inputUser" class="form-control" value="${savedName}">


                              </div>
                              <div class="form-group">
                                    <label>Contraseña:</label>
                                    <input type="password" name="inputPassword" class="form-control">
                              </div>

                               <c:if test="${flash != null}">
                                 <div class="text-danger"> <c:out value="${flash}"></c:out> </div>
                               </c:if>
                              <input type="submit" name="action" value="Ingresar" class="btn btn-primary w-100 mt-4">
                        </form>
                    </div>



              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Registrarse
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse ${accordion2}" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <form class="form-sign" action="register" method="POST">
                       <div class="form-group text-center" >
                            <h3>Registrarse</h3>
                       </div>
                       <div class="form-group">
                            <label>Usuario:</label>
                            <input type="text" name="registerName" class="form-control">
                      </div>
                     <div class="form-group">
                          <label>Email:</label>
                          <input type="text" name="registerEmail" class="form-control">
                    </div>
                      <div class="form-group">
                            <label>Contraseña:</label>
                            <input type="password" name="registerPassword" class="form-control">
                      </div>

                       <c:if test="${invalidUser != null}">
                            <div class="text-danger"> <c:out value="${invalidUser}"></c:out> </div>
                       </c:if>
                      <input type="submit" name="action" value="Registrarse" class="btn btn-primary w-100 mt-4">
                </form>
              </div>
            </div>
          </div>
        </div>



    </div>

</body>
</html>
