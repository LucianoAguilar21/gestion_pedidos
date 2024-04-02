package persistence.dao;

import models.Product;
import persistence.commons.GenericDAO;

public interface ProductDAO extends GenericDAO<Product> {

    public Product findByName();

}
