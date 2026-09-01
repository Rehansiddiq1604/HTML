import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet("/HiddenFieldServlet")
public class HiddenFieldServlet extends HttpServlet {

    protected void doPost(HttpServletRequest request,
            HttpServletResponse response)
            throws ServletException, IOException {

        // Get username from hidden form field
        String name = request.getParameter("hf");

        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        out.println("<!DOCTYPE html>");
        out.println("<html>");
        out.println("<head>");
        out.println("<title>Hidden Form Field</title>");

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
        out.println("text-align: center;");
        out.println("}");

        out.println("h2 {");
        out.println("color: #333399;");
        out.println("}");

        out.println(".info {");
        out.println("border: 1px solid #dddddd;");
        out.println("padding: 15px;");
        out.println("margin-top: 20px;");
        out.println("}");

        out.println("a {");
        out.println("color: #333399;");
        out.println("font-weight: bold;");
        out.println("}");

        out.println("</style>");
        out.println("</head>");

        out.println("<body>");

        out.println("<div class='box'>");

        out.println("<h2>Hidden Form Field</h2>");

        out.println("<div class='info'>");

        out.println("<p><b>Hello, " + name + "</b></p>");

        out.println("<p>");
        out.println("Username received successfully using a ");
        out.println("<b>Hidden Form Field</b>.");
        out.println("</p>");

        out.println("<p>");
        out.println("The value was stored in a hidden input field ");
        out.println("and submitted to this servlet.");
        out.println("</p>");

        out.println("</div>");

        out.println("<br>");

        out.println("<a href='index.html'>Back to Home</a>");

        out.println("</div>");

        out.println("</body>");
        out.println("</html>");
    }
}
