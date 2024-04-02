package test;

import service.ProductService;
import service.UserService;

public class Test {



    public static void main(String[] args) {

        ProductService productService = new ProductService();

        System.out.println(productService.getAllProducts());

        productService.insertProduct("Prepizza","2300");

        System.out.println(productService.getAllProducts());


    }

}
