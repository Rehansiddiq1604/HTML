package com.exam;

import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet(name = "ExamServlet", urlPatterns = {"/ExamServlet"})
public class ExamServlet extends HttpServlet {

    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {

        response.setContentType("text/html;charset=UTF-8");

        PrintWriter out = response.getWriter();
        String[] correctAnswers = {
            "p",
            "CSS",
            "ul",
            "alt",
            "font-size",
            "table",
            "br",
            "background-color",
            "li",
            "font-weight"
        };
        int score = 0;
        int attempted = 0;

        for (int i = 0; i < 10; i++) {

            String answer = request.getParameter("q" + (i + 1));

            if (answer != null && !answer.equals("")) {
                attempted++;

                if (answer.equals(correctAnswers[i])) {
                    score++;
                }
            }
        }

        int totalQuestions = 10;
        int wrongAnswers = attempted - score;
        int percentage = (score * 100) / totalQuestions;

        String status;

        if (score >= 5) {
            status = "PASSED";
        } else {
            status = "FAILED";
        }

        out.println("<!DOCTYPE html>");
        out.println("<html>");
        out.println("<head>");

        out.println("<title>Exam Result</title>");

        out.println("<style>");

        out.println("body {");
        out.println("font-family: Arial;");
        out.println("background-color: #f5f5dc;");
        out.println("margin: 0;");
        out.println("padding: 0;");
        out.println("}");

        out.println(".result {");
        out.println("width: 600px;");
        out.println("margin: 60px auto;");
        out.println("background-color: white;");
        out.println("padding: 30px;");
        out.println("border: 1px solid #800000;");
        out.println("text-align: center;");
        out.println("}");

        out.println("h1 {");
        out.println("color: #800000;");
        out.println("}");

        out.println(".student {");
        out.println("text-align: left;");
        out.println("margin: 20px 50px;");
        out.println("}");

        out.println(".student p {");
        out.println("font-size: 16px;");
        out.println("}");

        out.println("table {");
        out.println("width: 90%;");
        out.println("margin: 20px auto;");
        out.println("border-collapse: collapse;");
        out.println("}");

        out.println("th, td {");
        out.println("border: 1px solid #800000;");
        out.println("padding: 12px;");
        out.println("}");

        out.println("th {");
        out.println("background-color: #800000;");
        out.println("color: white;");
        out.println("}");

        out.println(".score {");
        out.println("font-size: 24px;");
        out.println("font-weight: bold;");
        out.println("color: #800000;");
        out.println("}");

        out.println(".passed {");
        out.println("color: green;");
        out.println("font-size: 20px;");
        out.println("font-weight: bold;");
        out.println("}");

        out.println(".failed {");
        out.println("color: red;");
        out.println("font-size: 20px;");
        out.println("font-weight: bold;");
        out.println("}");

        out.println(".button {");
        out.println("display: inline-block;");
        out.println("padding: 10px 20px;");
        out.println("margin: 10px;");
        out.println("background-color: #800000;");
        out.println("color: white;");
        out.println("text-decoration: none;");
        out.println("}");

        out.println("</style>");

        out.println("</head>");

        out.println("<body>");

        out.println("<div class='result'>");

        out.println("<h1>Exam Result</h1>");

        out.println("<div class='student'>");

        out.println("<p><b>Student Name:</b> Student</p>");
        out.println("<p><b>Exam:</b> Internet Programming Quiz</p>");

        out.println("</div>");

        out.println("<table>");

        out.println("<tr>");
        out.println("<th>Details</th>");
        out.println("<th>Result</th>");
        out.println("</tr>");

        out.println("<tr>");
        out.println("<td>Total Questions</td>");
        out.println("<td>" + totalQuestions + "</td>");
        out.println("</tr>");

        out.println("<tr>");
        out.println("<td>Questions Attempted</td>");
        out.println("<td>" + attempted + "</td>");
        out.println("</tr>");

        out.println("<tr>");
        out.println("<td>Correct Answers</td>");
        out.println("<td>" + score + "</td>");
        out.println("</tr>");

        out.println("<tr>");
        out.println("<td>Wrong Answers</td>");
        out.println("<td>" + wrongAnswers + "</td>");
        out.println("</tr>");

        out.println("<tr>");
        out.println("<td>Percentage</td>");
        out.println("<td>" + percentage + "%</td>");
        out.println("</tr>");

        out.println("</table>");

        out.println("<p class='score'>Score: " + score + " / " + totalQuestions + "</p>");

        if (score >= 5) {
            out.println("<p class='passed'>Congratulations! You Passed</p>");
        } else {
            out.println("<p class='failed'>Sorry! You Failed</p>");
        }

        out.println("<a class='button' href='exam.html'>Try Again</a>");

        out.println("<a class='button' href='home.html'>Home</a>");

        out.println("</div>");

        out.println("</body>");

        out.println("</html>");
    }
}
