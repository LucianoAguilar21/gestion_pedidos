package persistence.impl;

import models.ROL;
import models.User;
import models.nullObjects.NullUser;
import persistence.commons.ConnectionProvider;
import persistence.commons.MissingDataException;
import persistence.dao.UserDAO;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

import static java.lang.String.valueOf;

public class UserDAOImpl implements UserDAO {
    @Override
    public User findbyID(Integer id) {
        return null;
    }

    @Override
    public List<User> findAll() {

        try {
            String query = "SELECT * FROM users";
            Connection connection = ConnectionProvider.getConnection();
            PreparedStatement statement = connection.prepareStatement(query);
            ResultSet resultSet = statement.executeQuery();

            ArrayList<User> users = new ArrayList<User>();

            while(resultSet.next()){
                users.add(new User(resultSet.getInt("id"),resultSet.getString("name"),resultSet.getString("password"),resultSet.getString("email"), resultSet.getInt("rol")));
            }
            return users;

        }catch (SQLException e){
            throw new MissingDataException(e.getMessage());
        }

    }

    @Override
    public int countAll() {
        return 0;
    }

    @Override
    public int insert(User user) {
        try{
            String query = "INSERT INTO users (name, email,password,rol) VALUES (?,?,?,?)";
            Connection connection = ConnectionProvider.getConnection();
            PreparedStatement statement = connection.prepareStatement(query);
            statement.setString(1,user.getName());
            statement.setString(2,user.getEmail());
            statement.setString(3,user.getPassword());
            statement.setString(4,valueOf(user.getRol()));

            int result = statement.executeUpdate();
            return result;

        }catch (SQLException e){
            throw new MissingDataException(e.getMessage());
        }
    }

    @Override
    public int update(User user) {
        return 0;
    }

    @Override
    public int delete(User user) {
        return 0;
    }

    @Override
    public User findByName(String name) {

        try {
            String query = "SELECT * FROM users WHERE name = ?";
            Connection connection = ConnectionProvider.getConnection();
            PreparedStatement statement = connection.prepareStatement(query);
            statement.setString(1,name);
            ResultSet resultSet = statement.executeQuery();
            User user = NullUser.build();
            if(resultSet.next()){
                user = new User(resultSet.getInt("id"),
                                resultSet.getString("name"),
                                resultSet.getString("password"),
                                resultSet.getString("email"),
                                resultSet.getInt("rol"));
            }
            return user;
        }catch (SQLException e){
            throw new MissingDataException(e.getMessage());
        }

    }

    @Override
    public boolean userExists(String name) {
        try {
            String query = "SELECT count(*) as amount FROM users WHERE name=?";
            Connection connection = ConnectionProvider.getConnection();
            PreparedStatement statement = connection.prepareStatement(query);
            statement.setString(1,name);
            ResultSet resultSet = statement.executeQuery();
            boolean result = false;
            if(resultSet.next()){
                result = resultSet.getBoolean("amount");
            }
            return result;
        }catch (SQLException e){
            throw new MissingDataException(e.getMessage());
        }
    }


}
