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
public class RetrieveInfoHandler extends DefaultHandler implements LexicalHandler { 
	protected StringBuffer companyName = null;
	protected StringBuffer address = null;
	protected StringBuffer city= null;
	protected StringBuffer state= null;
	protected StringBuffer zip= null;
	protected StringBuffer phone= null;
	protected StringBuffer fax= null;
	protected StringBuffer webUrl= null;
	protected StringBuffer description= null;
	protected StringBuffer salesId= null;
	protected StringBuffer employeeId= null;	
	protected StringBuffer researchDone= null;
	protected StringBuffer yearFounded= null;
	protected StringBuffer executive= null;
	protected StringBuffer publicCompany= null;
	protected StringBuffer ticker= null;
	protected StringBuffer hq= null;
	protected StringBuffer publishFlag= null;
	protected StringBuffer topCompany= null;
	protected StringBuffer excReason= null;
	protected StringBuffer ranking= null;
	protected StringBuffer numEployee= null;
	protected StringBuffer hrURL= null;
	protected StringBuffer addNotes= null;
	protected StringBuffer SIC= null;
	protected StringBuffer NAIC= null;
	protected StringBuffer contactFirst= null;
	protected StringBuffer contactLast= null;
	protected StringBuffer contactNumber= null;
	protected StringBuffer contactTitle= null;
	protected StringBuffer contactEmail= null;
	protected StringBuffer categories= null;
	
	private Company company = null;
	private List <Company> companies = null;
	
	public void startElement(String uri, String localName, String qName,
			Attributes attributes) {
		try {		
			if (qName.compareToIgnoreCase("row") == 0) {
				company = new Company();
			}
			
			if (qName.compareToIgnoreCase("CompanyName") == 0) {
				if (companyName == null) {
					companyName = new StringBuffer();
				}
			}
			if (qName.compareToIgnoreCase("CompanyAddress") == 0) {
				if (address == null) {
					address = new StringBuffer();
				}
			}
			if (qName.compareToIgnoreCase("CompanyCity") == 0) {
				if (city == null) {
					city = new StringBuffer();
				}
			}
			if (qName.compareToIgnoreCase("CompanyDescription") == 0) {
				if (description == null) {
					description = new StringBuffer();
				}
			}
			if (qName.compareToIgnoreCase("CompanyFax") == 0) {
				if (fax == null) {
					fax = new StringBuffer();
				}
			}
			if (qName.compareToIgnoreCase("CompanyPhone") == 0) {
				if (phone == null) {
					phone = new StringBuffer();
				}
			}
			if (qName.compareToIgnoreCase("CompanyState") == 0) {
				if (state == null) {
					state = new StringBuffer();
				}
			}
			if (qName.compareToIgnoreCase("CompanyWebsite") == 0) {
				if (webUrl == null) {
					webUrl = new StringBuffer();
				}
			}
			if (qName.compareToIgnoreCase("CompanyZip") == 0) {
				if (zip == null) {
					zip = new StringBuffer();
				}
			}
			if (qName.compareToIgnoreCase("SalesRange") == 0) {
				if (salesId == null) {
					salesId = new StringBuffer();
				}
			}
			if (qName.compareToIgnoreCase("EmployeeRange") == 0) {
				if (employeeId == null) {
					employeeId = new StringBuffer();
				}
			}
			if (qName.compareToIgnoreCase("ReserachCompleted") == 0) {
				if (researchDone == null) {
					researchDone = new StringBuffer();
				}
			}
			
			if (qName.compareToIgnoreCase("YearFounded") == 0) {
				if (yearFounded == null) {
					yearFounded = new StringBuffer();
				}
			}
			if (qName.compareToIgnoreCase("TopLocalExecutiveName") == 0) {
				if (executive == null) {
					executive = new StringBuffer();
				}
			}
			if (qName.compareToIgnoreCase("PublicPrivate") == 0) {
				if (publicCompany == null) {
					publicCompany = new StringBuffer();
				}
			}
			if (qName.compareToIgnoreCase("PublicData") == 0) {
				if (ticker == null) {
					ticker = new StringBuffer();
				}
			}
			if (qName.compareToIgnoreCase("HeadquartersBranch") == 0) {
				if (hq == null) {
					hq = new StringBuffer();
				}
			}
			if (qName.compareToIgnoreCase("ProfileToBePublished") == 0) {
				if (publishFlag == null) {
					publishFlag = new StringBuffer();
				}
			}
			if (qName.compareToIgnoreCase("") == 0) {
				if (topCompany == null) {
					topCompany = new StringBuffer();
				}
			}
			if (qName.compareToIgnoreCase("ExclusionReason") == 0) {
				if (excReason == null) {
					excReason = new StringBuffer();
				}
			}
			if (qName.compareToIgnoreCase("") == 0) {
				if (ranking == null) {
					ranking = new StringBuffer();
				}
			}
			if (qName.compareToIgnoreCase("NumberOfMEmployees") == 0) {
				if (numEployee == null) {
					numEployee = new StringBuffer();
				}
			}
			if (qName.compareToIgnoreCase("HRSITE:") == 0) {
				if (hrURL == null) {
					hrURL = new StringBuffer();
				}
			}
			if (qName.compareToIgnoreCase("Sources") == 0) {
				if (addNotes == null) {
					addNotes = new StringBuffer();
				}
			}
			if (qName.compareToIgnoreCase("SIC") == 0) {
				if (SIC == null) {
					SIC = new StringBuffer();
				}
			}
			if (qName.compareToIgnoreCase("NAICS") == 0) {
				if (NAIC == null) {
					NAIC = new StringBuffer();
				}
			}
			if (qName.compareToIgnoreCase("") == 0) {
				if (contactFirst == null) {
					contactFirst = new StringBuffer();
				}
			}
			if (qName.compareToIgnoreCase("") == 0) {
				if (contactLast == null) {
					contactLast = new StringBuffer();
				}
			}
			if (qName.compareToIgnoreCase("") == 0) {
				if (contactNumber == null) {
					contactNumber = new StringBuffer();
				}
			}
			if (qName.compareToIgnoreCase("") == 0) {
				if (contactTitle == null) {
					contactTitle = new StringBuffer();
				}
			}
			if (qName.compareToIgnoreCase("") == 0) {
				if (contactEmail == null) {
					contactEmail = new StringBuffer();
				}
			}
			if (qName.compareToIgnoreCase("ListOne") == 0) {
				if (categories == null) {
					categories = new StringBuffer();
				}
			}
		
		} catch (Exception ex) {
			ex.printStackTrace();
			System.exit(1);
		}
	}

	public void characters(char[] ch, int start, int length) {
		if (companyName != null) {
			companyName.append(Utility.translateUTF(ch, start, length));
		}
		if (address != null) {
			address.append(Utility.translateUTF(ch, start, length));
		}
		if (city != null) {
			city.append(Utility.translateUTF(ch, start, length));
		}
		if (description != null) {
			description.append(Utility.translateUTF(ch, start, length));
		}
		if (fax != null) {
			fax.append(Utility.translateUTF(ch, start, length));
		}
		if (phone != null) {
			phone.append(Utility.translateUTF(ch, start, length));
		}
		if (state != null) {
			state.append(Utility.translateUTF(ch, start, length));
		}
		if (webUrl != null) {
			webUrl.append(Utility.translateUTF(ch, start, length));
		}
		if (zip != null) {
			zip.append(Utility.translateUTF(ch, start, length));
		}
		if (salesId != null) {
			salesId.append(Utility.translateUTF(ch, start, length));
		}
		if (employeeId != null) {
			employeeId.append(Utility.translateUTF(ch, start, length));
		}
		if (yearFounded != null) {
			yearFounded.append(Utility.translateUTF(ch, start, length));
		}
		if (executive != null) {
			executive.append(Utility.translateUTF(ch, start, length));
		}
		if (publicCompany != null) {
			publicCompany.append(Utility.translateUTF(ch, start, length));
		}
		if (ticker != null) {
			ticker.append(Utility.translateUTF(ch, start, length));
		}
		if (hq != null) {
			hq.append(Utility.translateUTF(ch, start, length));
		}
		if (publishFlag != null) {
			publishFlag.append(Utility.translateUTF(ch, start, length));
		}
		if (topCompany != null) {
			topCompany.append(Utility.translateUTF(ch, start, length));
		}
		if (excReason != null) {
			excReason.append(Utility.translateUTF(ch, start, length));
		}
		if (ranking != null) {
			ranking.append(Utility.translateUTF(ch, start, length));
		}
		if (numEployee != null) {
			numEployee.append(Utility.translateUTF(ch, start, length));
		}
		if (hrURL != null) {
			hrURL.append(Utility.translateUTF(ch, start, length));
		}
		if (addNotes != null) {
			addNotes.append(Utility.translateUTF(ch, start, length));
		}
		if (SIC != null) {
			SIC.append(Utility.translateUTF(ch, start, length));
		}
		if (NAIC != null) {
			NAIC.append(Utility.translateUTF(ch, start, length));
		}
		if (contactFirst != null) {
			contactFirst.append(Utility.translateUTF(ch, start, length));
		}
		if (contactLast != null) {
			contactLast.append(Utility.translateUTF(ch, start, length));
		}
		if (contactNumber != null) {
			contactNumber.append(Utility.translateUTF(ch, start, length));
		}
		if (contactTitle != null) {
			contactTitle.append(Utility.translateUTF(ch, start, length));
		}
		if (contactEmail != null) {
			contactEmail.append(Utility.translateUTF(ch, start, length));
		}
		if (categories != null) {
			categories.append(Utility.translateUTF(ch, start, length));
		}
		if (researchDone != null) {
			researchDone.append(Utility.translateUTF(ch, start, length));
		}
	}

	public void endElement(String uri, String localName, String qName) {
		try {
			
			if (qName.compareToIgnoreCase("CompanyName") == 0) {
				if (companyName != null) {
					company.setName(companyName.toString());
					companyName = null;
				}
			}
			if (qName.compareToIgnoreCase("CompanyAddress") == 0) {
				if (address != null) {
					company.setAddress(address.toString());
					address = null;
				}
			}
			if (qName.compareToIgnoreCase("CompanyCity") == 0) {
				if (city != null) {
					company.setCity(city.toString());
					city = null;
				}
			}
			if (qName.compareToIgnoreCase("CompanyDescription") == 0) {
				if (description != null) {
					company.setDescription(description.toString());
					description = null;
				}
			}
			if (qName.compareToIgnoreCase("CompanyFax") == 0) {
				if (fax != null) {
					company.setFax(fax.toString());
					fax = null;
				}
			}
			if (qName.compareToIgnoreCase("CompanyPhone") == 0) {
				if (phone != null) {
					company.setPhone(phone.toString());
					phone = null;
				}
			}
			if (qName.compareToIgnoreCase("CompanyState") == 0) {
				if (state != null) {
					company.setState(state.toString());
					state = null;
				}
			}
			if (qName.compareToIgnoreCase("CompanyWebsite") == 0) {
				if (webUrl != null) {
					company.setWebUrl(webUrl.toString());
					webUrl = null;
				}
			}
			if (qName.compareToIgnoreCase("CompanyZip") == 0) {
				if (zip != null) {
					company.setZip(zip.toString());
					zip = null;
				}
			}
			if (qName.compareToIgnoreCase("SalesRange") == 0) {
				if (salesId != null) {
					company.setSalesId(this.convertSalesIdToInt(salesId.toString()));
					salesId = null;
				}
			}
			if (qName.compareToIgnoreCase("EmployeeRange") == 0) {
				if (employeeId != null) {
					company.setEmployeeID(this.convertEmployeeIdToInt(employeeId.toString()));
					employeeId = null;
				}
			}
			if (qName.compareToIgnoreCase("ReserachCompleted") == 0) {
				if (researchDone != null) {
					company.setResearchDone(Utility.convertStringToBoolean(researchDone.toString()));
					researchDone = null;
				}
			}	
			if (qName.compareToIgnoreCase("YearFounded") == 0) {
				if (yearFounded != null) {
					try {
						company.setYearFounded(Integer.parseInt(yearFounded.toString()));
					}
					catch (Exception ex) {}
					yearFounded = null;
				}
			}
			if (qName.compareToIgnoreCase("TopLocalExecutiveName") == 0) {
				if (executive != null) {
					company.setExecutive(executive.toString());
					executive = null;
				}
			}
			if (qName.compareToIgnoreCase("PublicPrivate") == 0) {
				if (publicCompany != null) {
					company.setPublicCompany(publicCompany.toString());
					publicCompany = null;
				}
			}
			if (qName.compareToIgnoreCase("PublicData") == 0) {
				if (ticker != null) {
					company.setTicker(ticker.toString());
					ticker = null;
				}
			}
			if (qName.compareToIgnoreCase("HeadquartersBranch") == 0) {
				if (hq != null) {
					company.setHq(hq.toString());
					hq = null;
				}
			}
			if (qName.compareToIgnoreCase("ProfileToBePublished") == 0) {
				if (publishFlag != null) {
					company.setPublished(Utility.convertStringToBoolean(publishFlag.toString()));
					publishFlag = null;
				}
			}
			if (qName.compareToIgnoreCase("ExclusionReason") == 0) {
				if (excReason != null) {
					company.setExcReason(excReason.toString());
					excReason = null;
				}
			}
			if (qName.compareToIgnoreCase("") == 0) {
				if (ranking != null) {
					company.setRanking(ranking.toString());
					ranking = null;
				}
			}
			if (qName.compareToIgnoreCase("NumberOfMEmployees") == 0) {
				if (numEployee != null) {
					company.setNumEmployees(numEployee.toString());
					numEployee = null;
				}
			}
			if (qName.compareToIgnoreCase("HRSITE:") == 0) {
				if (hrURL != null) {
					company.setHrUrl(hrURL.toString());
					hrURL = null;
				}
			}
			if (qName.compareToIgnoreCase("Sources") == 0) {
				if (addNotes != null) {
					company.setAddNotes(addNotes.toString());
					addNotes = null;
				}
			}
			if (qName.compareToIgnoreCase("SIC") == 0) {
				if (SIC != null) {
					try
					{
						company.setSic(Integer.parseInt(SIC.toString()));
					}
					catch (Exception ex) {}
					SIC = null;
				}
			}
			if (qName.compareToIgnoreCase("NAICS") == 0) {
				if (NAIC != null) {
					try {
						company.setNaic(Integer.parseInt(NAIC.toString()));
					}
					catch (Exception ex) {}
					NAIC = null;
				}
			}
			if (qName.compareToIgnoreCase("") == 0) {
				if (contactFirst != null) {
					company.setContactFirst(contactFirst.toString());
					contactFirst = null;
				}
			}
			if (qName.compareToIgnoreCase("") == 0) {
				if (contactLast != null) {
					company.setContactLast(contactLast.toString());
					contactLast = null;
				}
			}
			if (qName.compareToIgnoreCase("") == 0) {
				if (contactNumber != null) {
					company.setContactNumber(contactNumber.toString());
					contactNumber = null;
				}
			}
			if (qName.compareToIgnoreCase("") == 0) {
				if (contactTitle != null) {
					company.setContactTitle(contactTitle.toString());
					contactTitle = null;
				}
			}
			if (qName.compareToIgnoreCase("") == 0) {
				if (contactEmail != null) {
					company.setContactEmail(contactEmail.toString());
					contactEmail = null;
				}
			}
			if (qName.compareToIgnoreCase("ListOne") == 0) {
				if (categories != null) {
					company.setCategories(this.convertCategory(categories.toString()));
					categories = null;
				}
			}
			
			if (qName.compareToIgnoreCase("row") == 0) {
					//ContentLoader.addToCompanies(company);
					companies.add(company);
					//company = null;
			}
		} catch (Exception ex) {
			ex.printStackTrace();
			System.exit(1);
		}
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