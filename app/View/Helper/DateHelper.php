<? class DateHelper extends AppHelper {
    var $listofdays = array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
    var $listofmonths = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août',
        'Septembre', 'Octobre', 'Novembre', 'Décembre');
    
    function dayofweek($date) {
        $w = date('w', strtotime($date));
        return $this->listofdays[$w];
    
    }
    
    function formatteddate($date) {
return $this->dayofweek($date).' '.date('j', strtotime($date)).' '.$this->listofmonths[date('n', strtotime($date))-1];
    }
    
    function when($date) {
		date_default_timezone_set('Australia/Sydney');
        $nbday = date('z', strtotime($date)) - date('z', time());
        
        switch($nbday) {
            case 0 : 
                return "Aujourd'hui";
                break;
            case 1 :
                return 'Demain';
                break;
            case 2 :
                return 'Après demain';
                break;
			case -1 :
				return 'Hier';
				break;
			case -2 : 
				return 'Avant-hier';
				break;
			case -3 :
				return 'Il y a 3 jours';
				break;
            case 3:
			return $this->dayofweek($date);
			break;
            case 4:
			return $this->dayofweek($date);
			break;
            case 5:
			return $this->dayofweek($date);
			break;
            case 6:
            return $this->dayofweek($date);
			break;
            case 7 :
                return $this->dayofweek($date);
            default:
                return $this->formatteddate($date);
                break;
        
        }
    }
	function whattime($date) {
		return $this->when($date).' à '.(date('G', strtotime($date))). ' h '.date('i', strtotime($date));

	}
}