package models.nullObjects;

import models.Product;

public class NullProduct extends Product {

    public static Product build(){
        return new NullProduct();
    }

    public NullProduct(){
        super(0,"",0.0);
    }
    public boolean isNull(){
        return true;
    }


}
