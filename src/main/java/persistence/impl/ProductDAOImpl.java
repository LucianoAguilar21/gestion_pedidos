package persistence.impl;

import models.Product;
import persistence.commons.ConnectionProvider;
import persistence.commons.MissingDataException;
import persistence.dao.ProductDAO;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

import static java.lang.String.valueOf;

public class ProductDAOImpl implements ProductDAO {
    @Override
    public Product findbyID(Integer id) {
        return null;
    }

    @Override
    public List<Product> findAll() {
        try {
            String query = "SELECT * FROM products";
            Connection connection = ConnectionProvider.getConnection();
            PreparedStatement statement = connection.prepareStatement(query);
            ResultSet resultSet = statement.executeQuery();

            ArrayList<Product> products = new ArrayList<Product>();

            while(resultSet.next()){
                products.add(new Product(resultSet.getInt("id"),resultSet.getString("name"),resultSet.getDouble("price")));
            }
            return products;
        }catch (SQLException e){
            throw new MissingDataException(e.getMessage());
        }
    }

    @Override
    public int countAll() {
        return 0;
    }

    @Override
    public int insert(Product product) {
        try{
            String query = "INSERT INTO products (name, price) VALUES (?,?)";
            Connection connection = ConnectionProvider.getConnection();
            PreparedStatement statement = connection.prepareStatement(query);
            statement.setString(1,product.getName());
            statement.setDouble(2,product.getPrice());

            int result = statement.executeUpdate();
            return result;

        }catch (SQLException e){
            throw new MissingDataException(e.getMessage());
        }
    }

    @Override
    public int update(Product product) {
        return 0;
    }

    @Override
    public int delete(Product product) {
        return 0;
    }

    @Override
    public Product findByName() {
        return null;
    }
}
