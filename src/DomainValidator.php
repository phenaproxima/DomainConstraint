<?php

namespace phenaproxima\DomainConstraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class DomainValidator extends ConstraintValidator {

  protected static $validTLDs = array("AC", "ACADEMY", "ACCOUNTANTS", "ACTIVE", "ACTOR", "AD", "AE", "AERO", "AF", "AG", "AGENCY", "AI", "AIRFORCE", "AL", "ALLFINANZ", "ALSACE", "AM", "AN", "AO", "AQ", "AR", "ARCHI", "ARMY", "ARPA", "AS", "ASIA", "ASSOCIATES", "AT", "ATTORNEY", "AU", "AUCTION", "AUDIO", "AUTOS", "AW", "AX", "AXA", "AZ", "BA", "BAR", "BARGAINS", "BAYERN", "BB", "BD", "BE", "BEER", "BERLIN", "BEST", "BF", "BG", "BH", "BI", "BID", "BIKE", "BIO", "BIZ", "BJ", "BLACK", "BLACKFRIDAY", "BLUE", "BM", "BMW", "BN", "BNPPARIBAS", "BO", "BOO", "BOUTIQUE", "BR", "BRUSSELS", "BS", "BT", "BUDAPEST", "BUILD", "BUILDERS", "BUSINESS", "BUZZ", "BV", "BW", "BY", "BZ", "BZH", "CA", "CAB", "CAL", "CAMERA", "CAMP", "CANCERRESEARCH", "CAPETOWN", "CAPITAL", "CARAVAN", "CARDS",
    "CARE", "CAREER", "CAREERS", "CASA", "CASH", "CAT", "CATERING", "CC", "CD", "CENTER", "CEO", "CERN", "CF", "CG", "CH", "CHANNEL", "CHEAP", "CHRISTMAS", "CHROME", "CHURCH", "CI", "CITIC", "CITY", "CK", "CL", "CLAIMS", "CLEANING", "CLICK", "CLINIC", "CLOTHING", "CLUB", "CM", "CN", "CO", "CODES", "COFFEE", "COLLEGE", "COLOGNE", "COM", "COMMUNITY", "COMPANY", "COMPUTER", "CONDOS", "CONSTRUCTION", "CONSULTING", "CONTRACTORS", "COOKING", "COOL", "COOP", "COUNTRY", "CR", "CREDIT", "CREDITCARD", "CRUISES", "CU", "CUISINELLA", "CV", "CW", "CX", "CY", "CYMRU", "CZ", "DAD", "DANCE", "DATING", "DAY", "DE", "DEALS", "DEGREE", "DEMOCRAT", "DENTAL", "DENTIST", "DESI", "DIAMONDS", "DIET", "DIGITAL", "DIRECT", "DIRECTORY", "DISCOUNT", "DJ", "DK", "DM", "DNP", "DO", "DOMAINS", "DURBAN", "DVAG", "DZ",
    "EAT", "EC", "EDU", "EDUCATION", "EE", "EG", "EMAIL", "ENGINEER", "ENGINEERING", "ENTERPRISES", "EQUIPMENT", "ER", "ES", "ESQ", "ESTATE", "ET", "EU", "EUS", "EVENTS", "EXCHANGE", "EXPERT", "EXPOSED", "FAIL", "FARM", "FEEDBACK", "FI", "FINANCE", "FINANCIAL", "FISH", "FISHING", "FITNESS", "FJ", "FK", "FLIGHTS", "FLORIST", "FLY", "FM", "FO", "FOO", "FORSALE", "FOUNDATION", "FR", "FRL", "FROGANS", "FUND", "FURNITURE", "FUTBOL", "GA", "GAL", "GALLERY", "GB", "GBIZ", "GD", "GE", "GENT", "GF", "GG", "GH", "GI", "GIFT", "GIFTS", "GIVES", "GL", "GLASS", "GLE", "GLOBAL", "GLOBO", "GM", "GMAIL", "GMO", "GMX", "GN", "GOOGLE", "GOP", "GOV", "GP", "GQ", "GR", "GRAPHICS", "GRATIS", "GREEN", "GRIPE", "GS", "GT", "GU", "GUIDE", "GUITARS", "GURU", "GW", "GY", "HAMBURG", "HAUS", "HEALTHCARE",
    "HELP", "HERE", "HIPHOP", "HIV", "HK", "HM", "HN", "HOLDINGS", "HOLIDAY", "HOMES", "HORSE", "HOST", "HOSTING", "HOUSE", "HOW", "HR", "HT", "HU", "IBM", "ID", "IE", "IL", "IM", "IMMO", "IMMOBILIEN", "IN", "INDUSTRIES", "INFO", "ING", "INK", "INSTITUTE", "INSURE", "INT", "INTERNATIONAL", "INVESTMENTS", "IO", "IQ", "IR", "IS", "IT", "JE", "JETZT", "JM", "JO", "JOBS", "JOBURG", "JP", "JUEGOS", "KAUFEN", "KE", "KG", "KH", "KI", "KIM", "KITCHEN", "KIWI", "KM", "KN", "KOELN", "KP", "KR", "KRD", "KRED", "KW", "KY", "KZ", "LA", "LACAIXA", "LAND", "LAWYER", "LB", "LC", "LEASE", "LGBT", "LI", "LIFE", "LIGHTING", "LIMITED", "LIMO", "LINK", "LK", "LOANS", "LONDON", "LOTTO", "LR", "LS", "LT", "LTDA", "LU", "LUXE", "LUXURY", "LV", "LY", "MA", "MAISON", "MANAGEMENT", "MANGO", "MARKET",
    "MARKETING", "MC", "MD", "ME", "MEDIA", "MEET", "MELBOURNE", "MEME", "MENU", "MG", "MH", "MIAMI", "MIL", "MINI", "MK", "ML", "MM", "MN", "MO", "MOBI", "MODA", "MOE", "MONASH", "MORTGAGE", "MOSCOW", "MOTORCYCLES", "MOV", "MP", "MQ", "MR", "MS", "MT", "MU", "MUSEUM", "MV", "MW", "MX", "MY", "MZ", "NA", "NAGOYA", "NAME", "NAVY", "NC", "NE", "NET", "NETWORK", "NEUSTAR", "NEW", "NEXUS", "NF", "NG", "NGO", "NHK", "NI", "NINJA", "NL", "NO", "NP", "NR", "NRA", "NRW", "NU", "NYC", "NZ", "OKINAWA", "OM", "ONG", "ONL", "OOO", "ORG", "ORGANIC", "OTSUKA", "OVH", "PA", "PARIS", "PARTNERS", "PARTS", "PE", "PF", "PG", "PH", "PHARMACY", "PHOTO", "PHOTOGRAPHY", "PHOTOS", "PHYSIO", "PICS", "PICTURES", "PINK", "PIZZA", "PK", "PL", "PLACE", "PLUMBING", "PM", "PN", "POHL", "POST", "PR", "PRAXI",
    "PRESS", "PRO", "PROD", "PRODUCTIONS", "PROF", "PROPERTIES", "PROPERTY", "PS", "PT", "PUB", "PW", "PY", "QA", "QPON", "QUEBEC", "RE", "REALTOR", "RECIPES", "RED", "REHAB", "REISE", "REISEN", "REN", "RENTALS", "REPAIR", "REPORT", "REPUBLICAN", "REST", "RESTAURANT", "REVIEWS", "RICH", "RIO", "RO", "ROCKS", "RODEO", "RS", "RSVP", "RU", "RUHR", "RW", "RYUKYU", "SA", "SAARLAND", "SARL", "SB", "SC", "SCA", "SCB", "SCHMIDT", "SCHULE", "SCOT", "SD", "SE", "SERVICES", "SEXY", "SG", "SH", "SHIKSHA", "SHOES", "SI", "SINGLES", "SJ", "SK", "SL", "SM", "SN", "SO", "SOCIAL", "SOFTWARE", "SOHU", "SOLAR", "SOLUTIONS", "SOY", "SPACE", "SPIEGEL", "SR", "ST", "SU", "SUPPLIES", "SUPPLY", "SUPPORT", "SURF", "SURGERY", "SUZUKI", "SV", "SX", "SY", "SYSTEMS", "SZ", "TATAR", "TATTOO", "TAX",
    "TC", "TD", "TECHNOLOGY", "TEL", "TF", "TG", "TH", "TIENDA", "TIPS", "TIROL", "TJ", "TK", "TL", "TM", "TN", "TO", "TODAY", "TOKYO", "TOOLS", "TOP", "TOWN", "TOYS", "TP", "TR", "TRADE", "TRAINING", "TRAVEL", "TT", "TUI", "TV", "TW", "TZ", "UA", "UG", "UK", "UNIVERSITY", "UNO", "UOL", "US", "UY", "UZ", "VA", "VACATIONS", "VC", "VE", "VEGAS", "VENTURES", "VERSICHERUNG", "VET", "VG", "VI", "VIAJES", "VILLAS", "VISION", "VLAANDEREN", "VN", "VODKA", "VOTE", "VOTING", "VOTO", "VOYAGE", "VU", "WALES", "WANG", "WATCH", "WEBCAM", "WEBSITE", "WED", "WF", "WHOSWHO", "WIEN", "WIKI", "WILLIAMHILL", "WME", "WORK", "WORKS", "WORLD", "WS", "WTC", "WTF", "XN--1QQW23A", "XN--3BST00M", "XN--3DS443G", "XN--3E0B707E", "XN--45BRJ9C", "XN--4GBRIM", "XN--55QW42G", "XN--55QX5D", "XN--6FRZ82G",
    "XN--6QQ986B3XL", "XN--80ADXHKS", "XN--80AO21A", "XN--80ASEHDB", "XN--80ASWG", "XN--90A3AC", "XN--C1AVG", "XN--CG4BKI", "XN--CLCHC0EA0B2G2A9GCD", "XN--CZR694B", "XN--CZRU2D", "XN--D1ACJ3B", "XN--FIQ228C5HS", "XN--FIQ64B", "XN--FIQS8S", "XN--FIQZ9S", "XN--FPCRJ9C3D", "XN--FZC2C9E2C", "XN--GECRJ9C", "XN--H2BRJ9C", "XN--I1B6B1A6A2E", "XN--IO0A7I", "XN--J1AMH", "XN--J6W193G", "XN--KPRW13D", "XN--KPRY57D", "XN--KPUT3I", "XN--L1ACC", "XN--LGBBAT1AD8J", "XN--MGB9AWBF", "XN--MGBA3A4F16A", "XN--MGBAAM7A8H", "XN--MGBAB2BD", "XN--MGBAYH7GPA", "XN--MGBBH1A71E", "XN--MGBC0A9AZCG", "XN--MGBERP4A5D4AR", "XN--MGBX4CD0AB", "XN--NGBC5AZD", "XN--NQV7F", "XN--NQV7FS00EMA", "XN--O3CW4H", "XN--OGBPF8FL", "XN--P1ACF", "XN--P1AI", "XN--PGBS0DH", "XN--Q9JYB4C", "XN--RHQV96G", "XN--S9BRJ9C", "XN--SES554G",
    "XN--UNUP4Y", "XN--VERMGENSBERATER-CTB", "XN--VERMGENSBERATUNG-PWB", "XN--VHQUV", "XN--WGBH1C", "XN--WGBL6A", "XN--XHQ521B", "XN--XKC2AL3HYE2A", "XN--XKC2DL3A5EE0H", "XN--YFRO4I67O", "XN--YGBI2AMMX", "XN--ZFR164B", "XXX", "XYZ", "YACHTS", "YANDEX", "YE", "YOKOHAMA", "YOUTUBE", "YT", "ZA", "ZIP", "ZM", "ZONE", "ZW",
  );

  public function validate($value, Constraint $constraint)
  {
    if (! static::isValid($value)) {
      $this->context->addViolation($constraint->message, array('%domain' => $value));
    }
  }

  /**
   * Validates a domain name according to the rules at:
   * http://en.wikipedia.org/wiki/Hostname#Restrictions_on_valid_host_names
   *
   * dot '.' delimited segments
   * Each segment must be between 1 and 63 characters
   * The entire thing must be <= 255 characters
   * Valid chars are 'a' to 'z', 'A' to 'Z', '0' to '9', and hyphen '-'
   * labels must not start or end with hyphen.
   *
   * Additionally, there must be at least 2 segments
   * Additionally, the last segment must be one of supported top level domains (TLD)
   * Additionally, must not start or end with dot '.'
   *
   * @return boolean
   */
  public static function isValid($value)
  {
    if (preg_match('/^\./', $value)) {
      return FALSE;
    }
    elseif (preg_match('/\.$/', $value)) {
      return FALSE;
    }
    elseif (strLen($value) > 255) {
      return FALSE;
    }
    elseif (preg_match('/[^a-zA-Z0-9-\.]/', $value)) {
      return FALSE;
    }

    $segments = explode(".", $value);
    if (sizeof($segments) < 2) {
      return FALSE;
    }

    foreach ($segments as $segment) {
      if (strlen($segment) < 1) {
        return FALSE;
      }
      elseif (strLen($segment) > 63) {
        return FALSE;
      }
      elseif (preg_match('/^-/', $segment)) {
        return FALSE;
      }
      elseif (preg_match('/-$/', $segment)) {
        return FALSE;
      }
    }

    // Ensure that the final segment (the TLD) is one we know about.
    return in_array(strToUpper(end($segments)), static::$validTLDs);
  }

}
