package service;

import models.Product;
import models.nullObjects.NullProduct;
import persistence.commons.DAOFactory;

import java.util.List;

public class ProductService {

    public List<Product> getAllProducts(){return DAOFactory.getProductDAO().findAll();   }

    public Product insertProduct(String name, String price){
        Product product = NullProduct.build();

        try{
            Double priceValue =  Double.parseDouble(price);
            product = new Product(0,name, priceValue);

            if(product.isValid()){
                DAOFactory.getProductDAO().insert(product);
            }
        }catch (Exception e){
            e.getMessage();
        }


        return product;
    }
}
