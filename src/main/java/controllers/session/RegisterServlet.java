package controllers.session;

import jakarta.servlet.RequestDispatcher;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import models.User;
import service.UserService;

import java.io.IOException;

@WebServlet("/register")
public class RegisterServlet extends HttpServlet {
    UserService userService;

    @Override
    public void init() throws ServletException {
        super.init();
        userService = new UserService();
    }

    @Override
    protected void doPost(HttpServletRequest req, HttpServletResponse resp) throws ServletException, IOException {
        String name = req.getParameter("registerName");
        String email = req.getParameter("registerEmail");
        String password = req.getParameter("registerPassword");


        User registerUser = userService.registerUser(name,password,email);
        if(registerUser.isValid()){
            User user = userService.login(name,password);
            req.getSession().setAttribute("user",user);
            resp.sendRedirect("home.jsp");
        }else{
            if(userService.existsUser(name)){
                req.setAttribute("invalidUser", "El usuario ya existe.");
            }else{
                req.setAttribute("invalidUser", "El nombre de usuario es invalido.");
            }

            RequestDispatcher dispatcher = getServletContext().getRequestDispatcher("/login.jsp");
            dispatcher.forward(req, resp);
        }
    }
}
