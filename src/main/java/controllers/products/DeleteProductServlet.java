package controllers.products;

import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import service.ProductService;

import java.io.IOException;

@WebServlet("/deleteProduct")
public class DeleteProductServlet extends HttpServlet {
    ProductService productService;
    @Override
    public void init() throws ServletException {
        super.init();
        productService = new ProductService();
    }

    @Override
    protected void doPost(HttpServletRequest req, HttpServletResponse resp) throws ServletException, IOException {
        String productId = req.getParameter("id");


        // Verificar si el ID del producto no está vacío
        if (productId != null && !productId.isEmpty()) {
            // Intentar eliminar el producto
            productService.deleteProduct(productId);

            resp.sendRedirect(req.getContextPath() + "/products?msg=deleteSuccess");

        } else {
            // Si no se proporciona un ID de producto válido, establecer un mensaje de error
            resp.sendRedirect(req.getContextPath() + "/products?msg=deleteError");
        }
    }
}
