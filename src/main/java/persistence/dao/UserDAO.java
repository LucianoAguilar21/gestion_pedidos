package persistence.dao;

import models.User;
import persistence.commons.GenericDAO;

public interface UserDAO extends GenericDAO<User> {
    public User findByName(String name);

    public boolean userExists(String name);


}
