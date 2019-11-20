<?php
require_once('DB_Connection.php');

class Job {
    
    private $jobId;
    private $company;
    private $jobTitle;
    private $city;
    private $description;
    private $jobLink;
    private $dateUpdated;
    private $published;
    private $isInternal;
    private $categories;

    function __construct() {
   
    }

/*
 *  to to database and fill data array with results
 */
    public function populate($id) {
        $this->jobId = $id;
        $query = "SELECT * FROM jobs WHERE job_id=".$id;

        $db = new DB_Connection();

        $result = $db->retrieveResults($query);
        if (@mysql_num_rows($result)) {
            while ($r=@mysql_fetch_assoc($result)) {
                $this->setCompany($r["company"]);
                $this->setJobTitle($r["job_title"]);
                $this->setCity($r["city"]);
                $this->setDescription($r["desc"]);
                $this->setJobLink($r["job_link"]);
                $this->setDateUpdated($r["date"]);
                $this->setPublished($r["published"]);
                $this->setIsInternal($r["isInternal"]);
            }
        }

        $query = "SELECT * FROM job_category_map WHERE job_id=".$id;
        $result = $db->retrieveResults($query);
        $categories = "";
        if (@mysql_num_rows($result)) {
            while ($r=@mysql_fetch_assoc($result)) {
                $categories .= $r["job_category_id"];
                $categories .="|";
                
            }
            
            $this->setCategories($categories);
        }   
    }

    /* This is the static comparing function: */
    static function cmp_jobs($a, $b)
    {
        $al = strtolower($a->dateUpdated);
        $bl = strtolower($b->dateUpdated);
        if ($al == $bl) {
            return 0;
        }
        return ($al < $bl) ? +1 : -1;
    }

    public function getJobId() {
        return $this->jobId;
    }

    public function setJobId($j_id) {
        return $this->jobId = $j_id;
    }

    public function getCompany() {
        return $this->company;
    }

    public function setCompany($company) {
        return $this->company = $company;
    }

    public function getJobTitle() {
        return $this->jobTitle;
    }

    public function setJobTitle($jobTitle) {
        return $this->jobTitle = $jobTitle;
    }

    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        return $this->city = $city;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        return $this->description = $description;
    }

    public function getJobLink() {
        return $this->jobLink;
    }

    public function setJobLink($jobLink) {
        return $this->jobLink = $jobLink;
    }

    public function getDateUpdated() {
        return $this->dateUpdated;
    }

    public function setDateUpdated($dateUpdated) {
        return $this->dateUpdated = $dateUpdated;
    }

    public function getPublished() {
        return $this->published;
    }

    public function setPublished($published) {
        return $this->published = $published;
    }

    public function getIsInternal() {
        return $this->isInternal;
    }

    public function setIsInternal($isInternal) {
        return $this->isInternal = $isInternal;
    }

    public function getCategories() {
        return $this->categories;
    }

    public function setCategories($categories) {
        return $this->categories = $categories;
    }
}
?>
