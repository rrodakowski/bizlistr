/**
 * 
 */
package dao;

/**
 * @author U0076235
 *
 */
public class Company {
	private String name;
	private String address;
	private String city;
	private String state;
	private String zip;
	private String phone;
	private String fax;
	private String webUrl;
	private String description;
	private int salesId;
	private int employeeID;
    private int yearFounded;
    private String executive;
    private String publicCompany;
    private String ticker;
    private String hq;
    private boolean published;
	private boolean researchDone;
	private String excReason;
	private String ranking;
	private String numEmployees;
	private String hrUrl;
	private String addNotes;
	private int Sic;
	private int Naic;
	private String contactFirst = "";
	private String contactLast  = "";
	private String contactNumber  = "";
	private String contactTitle  = "";
    private String contactEmail  = "";
    private String categories  = "";

	/**
	 * @return the name
	 */
	public String getName() {
		return name;
	}
	/**
	 * @param name the name to set
	 */
	public void setName(String name) {
		this.name = name;
	}
	/**
	 * @return the address
	 */
	public String getAddress() {
		return address;
	}
	/**
	 * @param address the address to set
	 */
	public void setAddress(String address) {
		this.address = address;
	}
	/**
	 * @return the city
	 */
	public String getCity() {
		return city;
	}
	/**
	 * @param city the city to set
	 */
	public void setCity(String city) {
		this.city = city;
	}
	/**
	 * @return the state
	 */
	public String getState() {
		return state;
	}
	/**
	 * @param state the state to set
	 */
	public void setState(String state) {
		this.state = state;
	}
	/**
	 * @return the zip
	 */
	public String getZip() {
		return zip;
	}
	/**
	 * @param zip the zip to set
	 */
	public void setZip(String zip) {
		this.zip = zip;
	}
	/**
	 * @return the phone
	 */
	public String getPhone() {
		return phone;
	}
	/**
	 * @param phone the phone to set
	 */
	public void setPhone(String phone) {
		this.phone = phone;
	}
	/**
	 * @return the fax
	 */
	public String getFax() {
		return fax;
	}
	/**
	 * @param fax the fax to set
	 */
	public void setFax(String fax) {
		this.fax = fax;
	}
	/**
	 * @return the webUrl
	 */
	public String getWebUrl() {
		return webUrl;
	}
	/**
	 * @param webUrl the webUrl to set
	 */
	public void setWebUrl(String webUrl) {
		this.webUrl = webUrl;
	}
	/**
	 * @return the description
	 */
	public String getDescription() {
		return description;
	}
	/**
	 * @param description the description to set
	 */
	public void setDescription(String description) {
		this.description = description;
	}
	/**
	 * @return the salesId
	 */
	public int getSalesId() {
		return salesId;
	}
	/**
	 * @param salesId the salesId to set
	 */
	public void setSalesId(int salesId) {
		this.salesId = salesId;
	}
	/**
	 * @return the employeeID
	 */
	public int getEmployeeID() {
		return employeeID;
	}
	/**
	 * @param employeeID the employeeID to set
	 */
	public void setEmployeeID(int employeeID) {
		this.employeeID = employeeID;
	}
	/**
	 * @return the yearFounded
	 */
	public int getYearFounded() {
		return yearFounded;
	}
	/**
	 * @param yearFounded the yearFounded to set
	 */
	public void setYearFounded(int yearFounded) {
		this.yearFounded = yearFounded;
	}
	/**
	 * @return the executive
	 */
	public String getExecutive() {
		return executive;
	}
	/**
	 * @param executive the executive to set
	 */
	public void setExecutive(String executive) {
		this.executive = executive;
	}
	/**
	 * @return the publicCompany
	 */
	public String getPublicCompany() {
		return publicCompany;
	}
	/**
	 * @param publicCompany the publicCompany to set
	 */
	public void setPublicCompany(String publicCompany) {
		this.publicCompany = publicCompany;
	}
	/**
	 * @return the ticker
	 */
	public String getTicker() {
		return ticker;
	}
	/**
	 * @param ticker the ticker to set
	 */
	public void setTicker(String ticker) {
		this.ticker = ticker;
	}
	/**
	 * @return the hq
	 */
	public String getHq() {
		return hq;
	}
	/**
	 * @param hq the hq to set
	 */
	public void setHq(String hq) {
		this.hq = hq;
	}
	/**
	 * @return the published
	 */
	public boolean isPublished() {
		return published;
	}
	/**
	 * @param published the published to set
	 */
	public void setPublished(boolean published) {
		this.published = published;
	}

	/**
	 * @return the excReason
	 */
	public String getExcReason() {
		return excReason;
	}
	/**
	 * @param excReason the excReason to set
	 */
	public void setExcReason(String excReason) {
		this.excReason = excReason;
	}
	/**
	 * @return the ranking
	 */
	public String getRanking() {
		return ranking;
	}
	/**
	 * @param ranking the ranking to set
	 */
	public void setRanking(String ranking) {
		this.ranking = ranking;
	}
	/**
	 * @return the numEmployees
	 */
	public String getNumEmployees() {
		return numEmployees;
	}
	/**
	 * @param numEmployees the numEmployees to set
	 */
	public void setNumEmployees(String numEmployees) {
		this.numEmployees = numEmployees;
	}
	/**
	 * @return the hrUrl
	 */
	public String getHrUrl() {
		return hrUrl;
	}
	/**
	 * @param hrUrl the hrUrl to set
	 */
	public void setHrUrl(String hrUrl) {
		this.hrUrl = hrUrl;
	}
	/**
	 * @return the addNotes
	 */
	public String getAddNotes() {
		return addNotes;
	}
	/**
	 * @param addNotes the addNotes to set
	 */
	public void setAddNotes(String addNotes) {
		this.addNotes = addNotes;
	}
	/**
	 * @return the sic
	 */
	public int getSic() {
		return Sic;
	}
	/**
	 * @param sic the sic to set
	 */
	public void setSic(int sic) {
		Sic = sic;
	}
	/**
	 * @return the naic
	 */
	public int getNaic() {
		return Naic;
	}
	/**
	 * @param naic the naic to set
	 */
	public void setNaic(int naic) {
		Naic = naic;
	}
	/**
	 * @return the contactFirst
	 */
	public String getContactFirst() {
		return contactFirst;
	}
	/**
	 * @param contactFirst the contactFirst to set
	 */
	public void setContactFirst(String contactFirst) {
		this.contactFirst = contactFirst;
	}
	/**
	 * @return the contactLast
	 */
	public String getContactLast() {
		return contactLast;
	}
	/**
	 * @param contactLast the contactLast to set
	 */
	public void setContactLast(String contactLast) {
		this.contactLast = contactLast;
	}
	/**
	 * @return the contactNumber
	 */
	public String getContactNumber() {
		return contactNumber;
	}
	/**
	 * @param contactNumber the contactNumber to set
	 */
	public void setContactNumber(String contactNumber) {
		this.contactNumber = contactNumber;
	}
	/**
	 * @return the contactTitle
	 */
	public String getContactTitle() {
		return contactTitle;
	}
	/**
	 * @param contactTitle the contactTitle to set
	 */
	public void setContactTitle(String contactTitle) {
		this.contactTitle = contactTitle;
	}
	/**
	 * @return the contactEmail
	 */
	public String getContactEmail() {
		return contactEmail;
	}
	/**
	 * @param contactEmail the contactEmail to set
	 */
	public void setContactEmail(String contactEmail) {
		this.contactEmail = contactEmail;
	}
	/**
	 * @return the categories
	 */
	public String getCategories() {
		return categories;
	}
	/**
	 * @param categories the categories to set
	 */
	public void setCategories(String categories) {
		this.categories = categories;
	}
	/**
	 * @return the researchDone
	 */
	public boolean isResearchDone() {
		return researchDone;
	}
	/**
	 * @param researchDone the researchDone to set
	 */
	public void setResearchDone(boolean researchDone) {
		this.researchDone = researchDone;
	}
	

}
