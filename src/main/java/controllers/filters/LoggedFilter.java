package controllers.filters;

import jakarta.servlet.*;
import jakarta.servlet.annotation.WebFilter;
import jakarta.servlet.http.HttpServletRequest;
import models.User;

import java.io.IOException;

@WebFilter(urlPatterns = "/home")
public class LoggedFilter implements Filter {

    @Override
    public void doFilter(ServletRequest request, ServletResponse response, FilterChain chain) throws IOException, ServletException {
        User user = (User) ((HttpServletRequest) request).getSession().getAttribute("user");
        if(user !=null){
            chain.doFilter(request,response);
        }else{
            request.setAttribute("flash","Por favor ingresar al sistema.");
            RequestDispatcher dispatcher = request.getServletContext().getRequestDispatcher("/index.jsp");
            dispatcher.forward(request, response);
        }
    }
}
