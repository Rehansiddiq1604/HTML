import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

@WebServlet("/WelcomeServlet")
public class WelcomeServlet extends HttpServlet {

    protected void doPost(HttpServletRequest request,
            HttpServletResponse response)
            throws ServletException, IOException {

        String name = request.getParameter("uname");
        String password = request.getParameter("password");

        // Create or get the current session
        HttpSession session = request.getSession();

        // Store username in session
        session.setAttribute("user", name);

        // Get unique visitor count
        Integer visitorCount =
                (Integer) getServletContext().getAttribute("visitorCount");

        if (visitorCount == null) {
            visitorCount = 0;
        }

        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        out.println("<!DOCTYPE html>");
        out.println("<html>");
        out.println("<head>");
        out.println("<title>Welcome</title>");

        out.println("<style>");
        out.println("body {");
        out.println("font-family: Arial;");
        out.println("background-color: #E6E6FA;");
        out.println("margin-top: 60px;");
        out.println("}");

        out.println(".box {");
        out.println("width: 500px;");
        out.println("margin: auto;");
        out.println("padding: 25px;");
        out.println("background-color: white;");
        out.println("border: 1px solid #cccccc;");
        out.println("}");

        out.println("h2 { color: #333399; }");

        out.println(".section {");
        out.println("border: 1px solid #dddddd;");
        out.println("padding: 15px;");
        out.println("margin-top: 15px;");
        out.println("}");

        out.println("input[type=submit] {");
        out.println("padding: 7px 15px;");
        out.println("background-color: #333399;");
        out.println("color: white;");
        out.println("border: none;");
        out.println("}");

        out.println("a {");
        out.println("color: #333399;");
        out.println("font-weight: bold;");
        out.println("}");

        out.println("</style>");

        out.println("</head>");
        out.println("<body>");

        out.println("<div class='box'>");

        out.println("<h2>Session Tracking using Java Servlet</h2>");

        out.println("<p><b>Welcome, " + name + "</b></p>");

        out.println("<p>Username: " + name + "</p>");

        // Display password in masked form
        out.println("<p>Password: ****</p>");

        out.println("<p><b>Total Unique Visitors: "
                + visitorCount + "</b></p>");

        // Hidden Form Field
        out.println("<div class='section'>");

        out.println("<h3>1. Hidden Form Field</h3>");

        out.println("<p>");
        out.println("Username is passed using a hidden form field.");
        out.println("</p>");

        out.println("<form action='HiddenFieldServlet' method='post'>");

        out.println("<input type='hidden' name='hf' value='" + name + "'>");

        out.println("<input type='submit' value='Go'>");

        out.println("</form>");

        out.println("</div>");

        // URL Rewriting
        out.println("<div class='section'>");

        out.println("<h3>2. URL Rewriting</h3>");

        out.println("<p>");
        out.println("Username is passed through the URL.");
        out.println("</p>");

        out.println("<a href='URLRewriteServlet?uname="
                + name + "'>Visit</a>");

        out.println("</div>");

        out.println("</div>");

        out.println("</body>");
        out.println("</html>");
    }

    protected void doGet(HttpServletRequest request,
            HttpServletResponse response)
            throws ServletException, IOException {

        response.setContentType("text/html");

        response.getWriter().println(
                "Please enter your username and password first.");
    }
}
