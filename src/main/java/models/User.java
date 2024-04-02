package models;

import utils.Crypt;

import java.util.HashMap;
import java.util.Map;
import java.util.Objects;

public class User {

    private int id;
    private String name;
    private String password;
    private String email;
    private int rol;

    Map<String, String> errors;

    public User() {
    }

    public User(int id, String name, String password, String email, int rol) {
        this.id = id;
        this.name = name;
        this.password = password;
        this.email = email;
        this.rol = rol;
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

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = Crypt.hash(password);
    }

    public boolean checkPassword(String password){
        return Crypt.match(password,this.password);
    }

    public boolean isValid(){
        validate();
        return errors.isEmpty();

    }

    public void validate(){
        errors = new HashMap<String,String>();

        if(this.name == null || this.name.length() <= 2)
            errors.put("nombre", "Nombre no valido");
    }

    public boolean isNull(){
        return false;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public int getRol() {
        return rol;
    }

    public void setRol(int rol) {
        this.rol = rol;
    }

    @Override
    public String toString() {
        return "User{" +
                "id=" + id +
                ", name='" + name + '\'' +
                ", password='" + password + '\'' +
                ", email='" + email + '\'' +
                ", rol=" + rol +
                '}';
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;
        User user = (User) o;
        return id == user.id && Objects.equals(name, user.name) && Objects.equals(password, user.password) && Objects.equals(email, user.email) && rol == user.rol;
    }

    @Override
    public int hashCode() {
        return Objects.hash(id, name, password, email, rol);
    }


}
