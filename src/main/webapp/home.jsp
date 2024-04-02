<%@page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c"%>
<!DOCTYPE html>
<html lang="es">
<head>
    <jsp:include page="partials/head.jsp"></jsp:include>
    <title>Home</title>
    <%@ page contentType="text/html; charset=UTF-8" %>
</head>
<body>
    <c:choose>
        <c:when test="${user != null}">

            <jsp:include page="partials/navbar.jsp" ></jsp:include>
        </c:when>
        <c:otherwise>

            <h3 class="text-danger">Por favor ingrear al sistema</h3>
            <a href="/">Volver</a>
        </c:otherwise>
    </c:choose>
</body>
</html>