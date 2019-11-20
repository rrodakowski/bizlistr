/**
 * 
 */
package bizlistr;

import java.nio.CharBuffer;
import java.text.SimpleDateFormat;
import java.util.Date;

/**
 * @author U0076235
 *
 */
public class Utility {

    public static String translateUTF(String str) {
        return translateUTF(str.toCharArray(), 0, str.length()).toString();
    }
	
    public static CharBuffer translateUTF(char[] ch, int start, int length) {
        StringBuffer buffer = new StringBuffer();

        int end = start + length;
        int i;
        int last = start;
        for (i = start; i < end; i++) {
            if ((int) ch[i] >= 0x80 || ch[i] == '<' || ch[i] == '>'
                    || ch[i] == '"' || ch[i] == '&' || ch[i] == '\'') {
                if (i - last > 0) {
                    buffer.append(ch, last, i - last);
                }
                if ((int) ch[i] >= 0x80) {
                    buffer.append("&#" + (int) ch[i] + ";");
                } else {
                    switch (ch[i]) {
                    case '<':
                        buffer.append("&lt;");
                        break;
                    case '>':
                        buffer.append("&gt;");
                        break;
                    case '"':
                        buffer.append("&quot;");
                        break;
                    case '\'':
                        buffer.append("&apos;");
                        break;
                    case '&':
                        buffer.append("&amp;");
                        break;
                    }
                }
                last = i + 1;
            }
        }
        if (last == start) {
            return CharBuffer.wrap(ch, start, length);
        } else {
            if (i - last > 0) {
                buffer.append(ch, last, i - last);
            }
            return CharBuffer.wrap(buffer.subSequence(0, buffer.length()));
        }
    }
    
	public void logEvent(String detailMsg) {
		SimpleDateFormat formatter = new SimpleDateFormat("yyyyMMddHHmmss");
		Date currentDT = new Date();
		String dtString = formatter.format(currentDT);
		String msg = "RIAGNetEventLog | " + dtString + " | " + 
					"NDOC Processing" + " | "  + getClass().getName() + " | " + 
					detailMsg;
		System.out.println(msg);
	}

	public void logError(String detailMsg) {
		SimpleDateFormat formatter = new SimpleDateFormat("yyyyMMddHHmmss");
		Date currentDT = new Date();
		String dtString = formatter.format(currentDT);
		String msg = "RIAGNetErrorLog | " + dtString + " | " + 
					"NDOC Processing" + " | "  + getClass().getName() + " | " + 
					detailMsg;
		System.err.println(msg);
	}

	public static boolean isNullOrEmpty(String str) {
		if (str == null)
			return true;
		
		if (str.length() == 0)
			return true;
		
		return false;
	}
	
	/*
	 * Takes in a 'y' or 'n', returning true or false
	 */
	public static boolean convertStringToBoolean(String str) {
		if (str.compareToIgnoreCase("y") ==0)
			return true;
		if (str.compareToIgnoreCase("n") == 0)
			return false;
		
		return false;
	}
}
