/**
 * 
 */
package handlers;

import java.util.List;
import java.util.Vector;

import org.xml.sax.Attributes;
import org.xml.sax.ext.LexicalHandler;
import org.xml.sax.helpers.DefaultHandler;

import bizlistr.ContentLoader;
import bizlistr.Utility;

import dao.Company;




/**
 * @author U0076235
 * 
 */
public class XmlFromExcelInfoHandler extends DefaultHandler implements LexicalHandler { 

	protected StringBuffer categories= null;
	
	private Company company = null;
	private List <Company> companies = null;
	
	public void startElement(String uri, String localName, String qName,
			Attributes attributes) {
		try {		
			if (qName.compareToIgnoreCase("Row") == 0) {
				company = new Company();
				company.setName(attributes.getValue("A"));
				company.setAddress(attributes.getValue("C"));
				company.setCity(attributes.getValue("D"));
				company.setDescription(attributes.getValue("O"));
				company.setFax(attributes.getValue("G"));
				company.setPhone(attributes.getValue("F"));
				company.setState(attributes.getValue("B"));
				company.setWebUrl(attributes.getValue("N"));
				company.setZip(attributes.getValue("E"));
				company.setSalesId(this.convertSalesIdToInt(attributes.getValue("I")));
				company.setEmployeeID(this.convertEmployeeIdToInt("5,001+"));
				company.setResearchDone(Utility.convertStringToBoolean("y"));
				try {
					company.setYearFounded(Integer.parseInt(attributes.getValue("J")));
				}
				catch (Exception ex) {}
				company.setExecutive(attributes.getValue("H"));
				company.setPublicCompany(attributes.getValue("M"));					
				company.setTicker("");
				company.setHq(attributes.getValue("L"));
				company.setPublished(Utility.convertStringToBoolean("y"));
				company.setExcReason("");
				company.setRanking("");
				company.setNumEmployees(attributes.getValue("K"));
				company.setHrUrl("");
				company.setAddNotes("");
		
				try
				{
					company.setSic(Integer.parseInt(""));
				}
				catch (Exception ex) {}
		
				try {
					company.setNaic(Integer.parseInt(""));
				}
				catch (Exception ex) {}
			
				company.setContactFirst("");
				company.setContactLast("");
				company.setContactNumber("");
				company.setContactTitle("");
				company.setContactEmail("");
				company.setCategories("47");
				companies.add(company);
			}	
		} catch (Exception ex) {
			ex.printStackTrace();
			System.exit(1);
		}
	}

	public void characters(char[] ch, int start, int length) {
	}

	public void endElement(String uri, String localName, String qName) {
	}

	public void processingInstruction(String target, String data) {
	}

	public void startDocument() {
		companies = new Vector <Company>();
	}

	public void endDocument() {
		ContentLoader.setcompanies(companies);
	}

	// for lexical

	public void comment(char[] ch, int start, int length) {
	}

	public void startCDATA() {
	}

	public void endCDATA() {
	}

	public void startEntity(String name) {
	}

	public void endEntity(String name) {
	}

	public void startDTD(String name, String publicId, String systemId) {
	}

	public void endDTD() {
	}
	
	// Utilities for string converstions
	
	private int convertSalesIdToInt(String s) {
		int id = 7;
		s = s.trim();
		if (s.compareToIgnoreCase("$100m+") == 0)
			id = 6;
		if (s.compareToIgnoreCase("50-$100m") == 0)
			id = 5;
		if (s.compareToIgnoreCase("25-$50m") == 0)
			id = 4;
		if (s.compareToIgnoreCase("10-$25m") == 0)
			id = 3;
		if (s.compareToIgnoreCase("5-$10m") == 0)
			id = 2;
		if (s.compareToIgnoreCase("0-$5m") == 0)
			id = 1;
		if (id == 9)
			System.err.println("Didn't find a sales id for: " +s);
		
		return id;
	}
	
	private int convertEmployeeIdToInt(String s) {
		int id = 9;
		s = s.trim();
		if (s.compareToIgnoreCase("5,001+") == 0)
			id = 8;
		if (s.compareToIgnoreCase("1,001-5,000") == 0)
			id = 7;
		if (s.compareToIgnoreCase("501-1,000") == 0)
			id = 6;
		if (s.compareToIgnoreCase("251-500") == 0)
			id = 5;
		if (s.compareToIgnoreCase("101-250") == 0)
			id = 4;
		if (s.compareToIgnoreCase("51-100") == 0)
			id = 3;
		if (s.compareToIgnoreCase("26-50") == 0)
			id = 2;
		if (s.compareToIgnoreCase("5-25") == 0)
			id = 1;
		if (id == 9)
			System.err.println("Didn't find an employee id for: " +s);
		
		return id;
	}
	
	private String convertCategory(String s) {
		int id = -1;
		s = s.trim();
		if (s.compareToIgnoreCase("AccountingFirms") == 0)
			id = 1;
		else if (s.compareToIgnoreCase("AdvertisingAgencies") == 0)
			id = 2;
		else if (s.compareToIgnoreCase("ArchitecturalFirms") == 0)
			id = 3;
		else if (s.compareToIgnoreCase("AssettManagmentFirms") == 0)
			id = 4;                     
		else if (s.compareToIgnoreCase("Banks") == 0)
			id = 5;
		else if (s.compareToIgnoreCase("BiotechScience") == 0)
			id = 6;
		else if (s.compareToIgnoreCase("CommercialRealEstateBrokers") == 0)
			id = 7;
		else if (s.compareToIgnoreCase("CommercialRealEstateDevelopers") == 0)
			id = 8;
		else if (s.compareToIgnoreCase("ITWebsiteDevelopers") == 0)
			id = 9;
		else if (s.compareToIgnoreCase("MedicalDevice") == 0)
			id = 10;
		else if (s.compareToIgnoreCase("MarketingAndBranding") == 0)
			id = 11;
		else if (s.compareToIgnoreCase("ITConsultants") == 0)
			id = 12;
		else if (s.compareToIgnoreCase("LawFirms") == 0)
			id = 13;
		else if (s.compareToIgnoreCase("ITInfrastructure") == 0)
			id = 14;
		else if (s.compareToIgnoreCase("ExecutiveSearchFirms") == 0)
			id = 15;
		else if (s.compareToIgnoreCase("CreditUnions") == 0)
			id = 16;
		else if (s.compareToIgnoreCase("EngineeringFirms") == 0)
			id = 17;
		else if (s.compareToIgnoreCase("PublicCompanies") == 0)
			id = 18;
		else if (s.compareToIgnoreCase("PublicRelationsFirms") == 0)
			id = 19;
		else if (s.compareToIgnoreCase("SoftwareCompanies") == 0)
			id = 20;
		else if (s.compareToIgnoreCase("Telecommunications") == 0)
			id = 21;
		else if (s.compareToIgnoreCase("TemporaryStaffingFirms") == 0)
			id = 22;
		else if (s.compareToIgnoreCase("MBA programs") == 0)
			id = 23;
		else if (s.compareToIgnoreCase("PropertyManagmentFirms") == 0)
			id = 24;
		else if (s.compareToIgnoreCase("ResidentialBuilders") == 0)
			id = 25;
		else 
			System.err.println("Didn't find a category match for: " +s);
		
		
		return Integer.toString(id);
	}
}