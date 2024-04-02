package persistence.commons;

import persistence.dao.ProductDAO;
import persistence.dao.UserDAO;
import persistence.impl.ProductDAOImpl;
import persistence.impl.UserDAOImpl;

public class DAOFactory {

    public static UserDAO getUserDAO(){
        return new UserDAOImpl();
    }

    public static ProductDAO getProductDAO(){return new ProductDAOImpl();
    }

}
