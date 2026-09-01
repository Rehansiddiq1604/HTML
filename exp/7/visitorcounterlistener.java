import javax.servlet.ServletContext;
import javax.servlet.annotation.WebListener;
import javax.servlet.http.HttpSessionEvent;
import javax.servlet.http.HttpSessionListener;

@WebListener
public class VisitorCounterListener implements HttpSessionListener {

    @Override
    public void sessionCreated(HttpSessionEvent se) {

        ServletContext context =
                se.getSession().getServletContext();

        synchronized (context) {

            Integer count =
                    (Integer) context.getAttribute("visitorCount");

            if (count == null) {
                count = 0;
            }

            count++;

            context.setAttribute("visitorCount", count);
        }
    }

    @Override
    public void sessionDestroyed(HttpSessionEvent se) {
        // No action required
    }
}
