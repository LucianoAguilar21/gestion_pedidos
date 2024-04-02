package models.nullObjects;

import models.User;

public class NullUser extends User {

    public static User build(){
        User user = new NullUser();
        return user;
    }

    public NullUser(){
        super(0,"","","",0);
    }
    public boolean isNull() {
        return true;
    }

}
