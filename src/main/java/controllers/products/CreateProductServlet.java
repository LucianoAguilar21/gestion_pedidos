package controllers.products;

import jakarta.servlet.RequestDispatcher;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import models.Product;
import service.ProductService;

import java.io.IOException;
import java.util.List;

@WebServlet("/addProduct")
public class CreateProductServlet extends HttpServlet {

    ProductService productService;

    @Override
    public void init() throws ServletException {
        super.init();
        productService = new ProductService();
    }

    @Override
    protected void doGet(HttpServletRequest req, HttpServletResponse resp) throws ServletException, IOException {
        req.setAttribute("productMsg", "El producto se agrego correctamente");

        List<Product> productList = productService.getAllProducts();

        req.setAttribute("products", productList);

        RequestDispatcher dispatcher = getServletContext()
                .getRequestDispatcher("/views/products.jsp");

        dispatcher.forward(req, resp);
        resp.sendRedirect("/products");
    }

    @Override
    protected void doPost(HttpServletRequest req, HttpServletResponse resp) throws ServletException, IOException {
        String productName = req.getParameter("productName");

        String productPrice = req.getParameter("productPrice");

        System.out.println(productPrice);

        Product product = productService.insertProduct(productName,productPrice);
        System.out.println(product);

        if (product.isValid()){
            req.setAttribute("productMsg", "El producto se agrego correctamente");

            List<Product> productList = productService.getAllProducts();

            req.setAttribute("products", productList);

            /*RequestDispatcher dispatcher = getServletContext()
                    .getRequestDispatcher("/views/products.jsp");
            dispatcher.forward(req, resp);*/

            this.doGet(req, resp);

        }else {
            req.setAttribute("productError", "Los datos ingresados son incorrectos");

            List<Product> productList = productService.getAllProducts();

            req.setAttribute("products", productList);


            /*RequestDispatcher dispatcher = getServletContext()
                    .getRequestDispatcher("/views/products.jsp");
            dispatcher.forward(req, resp);*/

            this.doGet(req, resp);
        }
    }
}
