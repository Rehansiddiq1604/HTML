package com.exam;

import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet("/LoginServlet")
public class LoginServlet extends HttpServlet {

    @Override
    protected void doPost(HttpServletRequest request,
                           HttpServletResponse response)
                           throws ServletException, IOException {

        String username = request.getParameter("username");
        String password = request.getParameter("password");

        if ("student".equals(username) && "1234".equals(password)) {

            response.sendRedirect("exam.html");

        } else {

            response.setContentType("text/html");

            PrintWriter out = response.getWriter();

            out.println("<html>");
            out.println("<head><title>Login Failed</title></head>");
            out.println("<body>");
            out.println("<h2>Invalid Username or Password</h2>");
            out.println("<a href='login.html'>Try Again</a>");
            out.println("</body>");
            out.println("</html>");
        }
    }
}
