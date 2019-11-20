/**
 * 
 */
package bizlistr;

import handlers.RetrieveInfoHandler;
import handlers.XmlFromExcelInfoHandler;

import java.io.BufferedInputStream;
import java.io.FileInputStream;
import java.sql.CallableStatement;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.util.List;
import java.util.Vector;

import javax.xml.parsers.SAXParser;
import javax.xml.parsers.SAXParserFactory;
import org.xml.sax.XMLReader;

import dao.Company;

/**
 * @author U0076235
 *
 */
public class ContentLoader {
	private static List <Company> companies = null;
	private String inputFileName;
	private  Connection con = null;
	
	public ContentLoader(String doc_nlf) {
		inputFileName = doc_nlf;
		
	/*	String doc_nlf_output = doc_nlf;
		
		PrintStream pstream_doc = null;
		
		try {	
			pstream_doc = new PrintStream(new FileOutputStream(doc_nlf_output));
		}
		catch (Exception e ) {
			e.printStackTrace();
			System.exit(1);
		}
		_printer_doc = new PrintStream(new BufferedOutputStream(pstream_doc));*/
	}
	
	/**
	 * @param _documentCache the _documentCache to set
	 */
	public static void addToCompanies(Company company) {
		ContentLoader.companies.add(company);
	}
	
	/**
	 * @param companies the companies to set
	 */
	public static Company getCompanyFromCompanies(String name) {
		for (int i = 0; i < ContentLoader.companies.size(); i ++) {
			Company comp = companies.get(i);
			if (comp.getName().compareToIgnoreCase(name) == 0) {
				return comp;
			}
		}
		
		return null;
	}

	/**
	 * @return the companies
	 */
	public static List <Company> getcompanies() {
		return companies;
	}

	/**
	 * @param documentCache the companies to set
	 */
	public static void setcompanies(List<Company> companies) {
		ContentLoader.companies = companies;
	}
	
	public void getCompanyData() {
		try {
			SAXParserFactory parserFactory = SAXParserFactory.newInstance();
			//RetrieveInfoHandler handler = new RetrieveInfoHandler();
			XmlFromExcelInfoHandler handler = new XmlFromExcelInfoHandler();
			SAXParser parser = parserFactory.newSAXParser();
			XMLReader xmlReader = parser.getXMLReader();
			xmlReader.setProperty(
					"http://xml.org/sax/properties/lexical-handler", handler);

			parser.parse(new BufferedInputStream(new FileInputStream(
					inputFileName), 1000000), handler);
			
			
		} catch (Exception ex) {
			ex.printStackTrace();
			System.exit(1);
		}
	}
	
	public void makeConnection() {
	   
	    try {
	      Class.forName("com.mysql.jdbc.Driver").newInstance();
	      con = DriverManager.getConnection("jdbc:mysql:///bizlistr",
	        "root", "root");

	      if(!con.isClosed())
	        System.out.println("Successfully connected to " +
	          "MySQL server using TCP/IP...");

	    } catch(Exception e) {
	      System.err.println("Exception: " + e.getMessage());
	    } 
	}
	
	public void closeConnection() {
		   
		try {
		   if(con != null)
		       con.close();
		} catch(SQLException e) {}
	}
	
	public void insertCompanies() {
		try
		{
			for (int i = 0; i < companies.size(); i++) {
				Company comp = companies.get(i);

				CallableStatement proc = con.prepareCall("{ call new_company(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) }");
				proc.setString(1, comp.getName());
				proc.setString(2, comp.getAddress());
				proc.setString(3, comp.getCity());
				proc.setString(4, comp.getState());
				proc.setString(5, comp.getZip());
				proc.setString(6, comp.getPhone());
				proc.setString(7, comp.getFax());
				proc.setString(8, comp.getWebUrl());
				proc.setString(9, comp.getDescription());
				proc.setInt(10, comp.getSalesId());
				proc.setInt(11, comp.getEmployeeID());
				proc.setInt(12, comp.getYearFounded());
				proc.setString(13, comp.getExecutive());
				proc.setString(14, comp.getPublicCompany());
				proc.setString(15, comp.getTicker());
				proc.setString(16, comp.getHq());
				proc.setBoolean(17, comp.isPublished());
				proc.setBoolean(18, comp.isResearchDone());
				proc.setString(19, comp.getExcReason());
				proc.setString(20, comp.getRanking());
				proc.setString(21, comp.getNumEmployees());
				proc.setString(22, comp.getHrUrl());
				proc.setString(23, comp.getAddNotes());
				proc.setInt(24, comp.getSic());
				proc.setInt(25, comp.getNaic());
				proc.setString(26, comp.getContactFirst());
				proc.setString(27, comp.getContactLast());
				proc.setString(28, comp.getContactNumber());
				proc.setString(29, comp.getContactTitle());
				proc.setString(30, comp.getContactEmail());
				proc.setString(31, comp.getCategories());
				
				proc.execute();
			}
		}
		catch (SQLException e)
		{
		    e.printStackTrace();
		    System.exit(1);
		}
		
	}
	
	public void debugCompanies() {
		try {
			for (int i = 0; i < companies.size(); i++) {
				Company comp = companies.get(i);
				System.out.println(comp.getName());
				System.out.println(comp.getAddress());
				System.out.println(comp.getCity());
				System.out.println(comp.getState());
				System.out.println(comp.getZip());
				System.out.println(comp.getPhone());
				System.out.println(comp.getFax());
				System.out.println(comp.getDescription());
				System.out.println(comp.getWebUrl());
				System.out.println(comp.getEmployeeID());
				System.out.println(comp.getSalesId());
				System.out.println(comp.isResearchDone());
				System.out.println("*****");
			}
			
		} catch (Exception ex) {
			ex.printStackTrace();
			System.exit(1);
		}
	}
	/**
	 * @param args
	 */
	public static void main(String[] args) {
		//1)Input.xml
		//2)other inputs?
	
		ContentLoader ws = new ContentLoader(args[0]);
		companies = new Vector<Company>();
		
		
		ws.getCompanyData();
		
		ws.makeConnection();
		
		//ws.debugCompanies();
		
		ws.insertCompanies();
		
		ws.closeConnection();
		
	    System.out.println(" *** Bizlistr Loading Complete *** ");
	}

}
