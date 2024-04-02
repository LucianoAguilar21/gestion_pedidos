package models;

import java.util.HashMap;
import java.util.Map;

public class Product {

    private int id;
    private String name;
    private Double price;

    private Map<String,String> errors;

    public Product() {
    }

    public Product(int id, String name, Double price) {
        this.id = id;
        this.name = name;
        this.price = price;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public Double getPrice() {
        return price;
    }

    public void setPrice(Double price) {
        this.price = price;
    }

    @Override
    public String toString() {
        return "Product{" +
                "id=" + id +
                ", name='" + name + '\'' +
                ", price=" + price +
                '}';
    }

    public boolean isNull(){
        return false;
    }

    public boolean isValid(){
        validate();
        return errors.isEmpty();
    }

    public void validate(){
        errors = new HashMap<>();
        if(this.name.length() <= 2)
            errors.put("nombre","El nombre debe tener mas de dos caracteres");
        if(this.price <= 0)
            errors.put("precio","El precio debe ser mayor a 0");

    }

    public Map<String,String> getErrors(){
        return this.errors;
    }
}
