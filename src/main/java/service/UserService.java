package service;

import models.User;
import models.nullObjects.NullUser;
import persistence.commons.DAOFactory;

import java.util.List;

public class UserService {


    public boolean existsUser(String name){
        return DAOFactory.getUserDAO().userExists(name);
    }

    public List<User> getAllUsers(){
        return DAOFactory.getUserDAO().findAll();
    }

    public User login(String name, String password){
        String nameLower = name.toLowerCase();
        User user = DAOFactory.getUserDAO().findByName(nameLower);
        if(user.isNull() || !user.checkPassword(password)){
            user = NullUser.build();
        }
        return user;
    }

    public User registerUser(String name, String password, String email){
        User user = NullUser.build();

        if(existsUser(name)){
            name = "";
        }

        user = toUser("0",name,password,email,"0");

        if(user.isValid()){
            DAOFactory.getUserDAO().insert(user);
        }

        return user;
    }


    private User toUser(String id, String name, String password, String email, String rol){
        int idint = Integer.parseInt(id);
        String nameLower = name.toLowerCase();
        String emailLower = email.toLowerCase();
        int rolint = Integer.parseInt(rol);

        User user = new User(idint, nameLower,password, emailLower, rolint);
        user.setPassword(password);

        return user;
    }

}
