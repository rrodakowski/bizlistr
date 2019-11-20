/**
 * 
 */
package tests;

import bizlistr.ContentLoader;
import junit.framework.TestCase;

/**
 * @author U0076235
 *
 */
public class ContentTester extends TestCase{
	/**
     * TestMethod for Worldwide tax database parsing
     * In the ibfdcountries.xml file, this creates tab_id =3
     */
    public void testBizlistrLoad() {
      	 try {
         	
     		String [] args = new String[1];
         	// which environment are we running on?
     		args[0] = "/home/randall/bizlistr/ContentLoader/abbrev_priv_cos.xml";
         	//args[0] = "/home/randall/bizlistr/ContentLoader/randallexp.xml";
     		//args[0] = "/home/randall/bizlistr/ContentLoader/sample_exp.xml";
         	// where is the properties file?
         	//args[1] = "C:\\bizlistr\\randallexp.xml";
      
         	ContentLoader.main(args);

         } catch (Exception e) {
             // TODO Auto-generated catch block
             e.printStackTrace();
         }
    }
}
