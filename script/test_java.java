import java.sql.*;
/*import java.io.*;

public class test_java {
    public static void main(String[] args) {
        try {
            // Téléchargement et installation du pilote JDBC
            String jdbcUrl = "https://cdn.mysql.com/archives/mysql-connector-java-5.1/mysql-connector-java-5.1.49.tar.gz";
            String jdbcFile = "mysql-connector-java-5.1.49.tar.gz";
            String jdbcDir = "mysql-connector-java-5.1.49";
            String jdbcDriver = "com.mysql.jdbc.Driver";
            downloadAndInstallJdbcDriver(jdbcUrl, jdbcFile, jdbcDir, jdbcDriver);

            //Copy code
            // Établissement de la connexion à la base de données
            String url = "jdbc:mysql://192.168.56.86:3306/css_test";
            String username = "css";
            String password = "csspass";
            Connection conn = DriverManager.getConnection(url, username, password);

            // Exécution d'une requête SQL
            String sql = "SELECT * FROM css_test";
            Statement stmt = conn.createStatement();
            ResultSet rs = stmt.executeQuery(sql);

            // Traitement des résultats de la requête
            while (rs.next()) {
              int id = rs.getInt("id");
              String entry = rs.getString("name");
              System.out.println("ID : " + id + ", Entry : " + entry);
            }

            // Fermeture de la connexion à la base de données
            rs.close();
            stmt.close();
            conn.close();
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}
*/

public class test_java {
    public static void main(String[] args) {
        try {
            // Enregistrement du driver JDBC
            Class.forName("com.mysql.cj.jdbc.Driver");
        

            //Copy code;
            // Établissement de la connexion à la base de données
            Connection conn = DriverManager.getConnection(
              "jdbc:mysql://192.168.56.86:3306/css_test", "css", "csspass");

            // Création de l'objet Statement
            Statement stmt = conn.createStatement();

            // Exécution de la requête
            ResultSet rs = stmt.executeQuery("SELECT * FROM css_test");
            System.out.println("laaaaaa");
            // Traitement du résultat
            while (rs.next()) {
              int id = rs.getInt("id");
              String entry = rs.getString("entry");

              System.out.println("ID : " + id + ", entry : " + entry);
            }

            // Fermeture de la connexion
        conn.close();
        } catch (Exception e) {
          e.printStackTrace();
        }
    }
}

