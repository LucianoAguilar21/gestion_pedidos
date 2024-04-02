package models;

import java.time.LocalDate;

public class Order {

    private int id;
    private String clientName;
    private LocalDate createdAt;
    private LocalDate deliveryDate;
    private boolean delivery;
    private String address;
    private OrderStatus status;
    private Double total;

    public Order() {
    }

}
