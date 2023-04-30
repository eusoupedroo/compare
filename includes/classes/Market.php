<?php
	class Market {

		private $con;
		private $id;
		private $mysqliData;

		private $marketName; 
		private $marketAddress;	 
		private $marketCepAddress;	 
		private $marketRate;	
		private $marketOpeningTime;	
		private $marketCloseTime;	
		private $marketDelivery;	
		private $profilePictureMarket;



		public function __construct($con, $id) {
			$this->con = $con;
			$this->id = $id;

			$query = mysqli_query($this->con, "SELECT * FROM market WHERE id='$this->id'");
			$this->mysqliData = mysqli_fetch_array($query);

			$this->marketName = $this->mysqliData['marketName'];
			$this->marketAddress = $this->mysqliData['marketAddress'];
			$this->marketCepAddress = $this->mysqliData['marketCepAddress'];
			$this->marketRate = $this->mysqliData['marketRate'];
			$this->marketOpeningTime = $this->mysqliData['marketOpeningTime'];
			$this->marketCloseTime = $this->mysqliData['marketCloseTime'];
			$this->marketDelivery = $this->mysqliData['marketDelivery'];
			$this->profilePictureMarket = $this->mysqliData['profilePictureMarket'];
		}

		public function getMarketName() {
			return $this->marketName;
		}

		public function getId() {
			return $this->id;
		}

		public function getMarketAddress() {
			return $this->marketAddress;
		}

		public function getMarketCep() {
			return $this->marketCepAddress;
		}

		public function getMarketRate() {
			return $this->marketRate;
		}

		public function getMarketOpeningTime() {
			return $this->marketOpeningTime;
		}

		public function getMarketCloseTime() {
			return $this->marketCloseTime;
		}

		public function getMarketDelivery() {
			return $this->marketDelivery;
		}

		public function getProfilePictureMarket() {
			return $this->profilePictureMarket;
		}

	}
?>