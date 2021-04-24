<?php


namespace Yosodog\PWTools\API\v1;


use GuzzleHttp\Exception\GuzzleException;
use stdClass;
use Yosodog\PWTools\Client;
use Yosodog\PWTools\Exceptions\NationDoesNotExist;
use Yosodog\PWTools\Exceptions\PWAPIKeyExhausted;
use Yosodog\PWTools\Exceptions\PWAPIKeyInvalid;

/**
 * Class Nation
 *
 * @package Yosodog\PWTools\API\v1
 */
class Nation
{
    /**
     * @var int
     */
    public int $nID;

    /**
     * @var Client
     */
    protected Client $client;
    /**
     * @var int
     */
    public int $cityProjectTimer;
    /**
     * @var string
     */
    public string $name;

    /**
     * @var string
     */
    public string $preName;

    /**
     * @var string
     */
    public string $continent;

    /**
     * @var string
     */
    public string $socialPolicy;

    /**
     * @var string
     */
    public string $color;

    /**
     * @var int
     */
    public int $minsInactive;

    /**
     * @var string
     */
    public string $uniqueID;

    /**
     * @var bool
     */
    public bool $exists;

    /**
     * @var bool
     */
    public bool $spyAvail;

    /**
     * @var string
     */
    public string $season;

    /**
     * @var float
     */
    public float $radiationIndex;

    /**
     * @var int
     */
    public int $beigeLeft;

    /**
     * @var array
     */
    public array $defWarIDs;

    /**
     * @var array
     */
    public array $offWarIDs;

    /**
     * @var int
     */
    public int $defWars;

    /**
     * @var int
     */
    public int $offWars;

    /**
     * @var int
     */
    public int $vMode;

    /**
     * @var bool
     */
    public bool $advEngCorps;

    /**
     * @var bool
     */
    public bool $arableLand;

    /**
     * @var bool
     */
    public bool $specialPoliceTrain;

    /**
     * @var bool
     */
    public bool $clinicalResCent;

    /**
     * @var bool
     */
    public bool $pirateEcon;

    /**
     * @var bool
     */
    public bool $recyclingInit;

    /**
     * @var bool
     */
    public bool $telecomSat;

    /**
     * @var bool
     */
    public bool $greenTech;

    /**
     * @var bool
     */
    public bool $moonLanding;

    /**
     * @var bool
     */
    public bool $spySat;

    /**
     * @var bool
     */
    public bool $spaceProgram;

    /**
     * @var bool
     */
    public bool $cenCivEng;

    /**
     * @var bool
     */
    public bool $propBureau;

    /**
     * @var bool
     */
    public bool $uraniumEnrichment;

    /**
     * @var bool
     */
    public bool $intelAgency;

    /**
     * @var bool
     */
    public bool $vitalDefSys;

    /**
     * @var bool
     */
    public bool $ironDome;

    /**
     * @var bool
     */
    public bool $nuclearResFacility;

    /**
     * @var bool
     */
    public bool $missilePad;

    /**
     * @var bool
     */
    public bool $intTradeCenter;

    /**
     * @var bool
     */
    public bool $massIrrigation;

    /**
     * @var bool
     */
    public bool $emgGasReserve;

    /**
     * @var bool
     */
    public bool $armsStockpile;

    /**
     * @var bool
     */
    public bool $bauxiteWorks;

    /**
     * @var bool
     */
    public bool $ironWorks;

    /**
     * @var float
     */
    public float $moneyLooted;

    /**
     * @var float
     */
    public float $infraLost;

    /**
     * @var float
     */
    public float $infraDestroyed;

    /**
     * @var int
     */
    public int $nukesEaten;

    /**
     * @var int
     */
    public int $nukesLaunched;

    /**
     * @var int
     */
    public int $nukes;

    /**
     * @var int
     */
    public int $missilesEaten;

    /**
     * @var int
     */
    public int $missilesLaunched;

    /**
     * @var int
     */
    public int $missiles;

    /**
     * @var int
     */
    public int $shipsKilled;

    /**
     * @var int
     */
    public int $shipsLost;

    /**
     * @var int
     */
    public int $ships;

    /**
     * @var int
     */
    public int $aircraftKilled;

    /**
     * @var int
     */
    public int $aircraftLost;

    /**
     * @var int
     */
    public int $aircraft;

    /**
     * @var int
     */
    public int $tanksKilled;

    /**
     * @var int
     */
    public int $tanksLost;

    /**
     * @var int
     */
    public int $tanks;

    /**
     * @var int
     */
    public int $soldiersKilled;

    /**
     * @var int
     */
    public int $soldiersLost;

    /**
     * @var int
     */
    public int $soldiers;

    /**
     * @var int
     */
    public int $land;

    /**
     * @var float
     */
    public float $infra;

    /**
     * @var float
     */
    public float $gdp;

    /**
     * @var int
     */
    public int $population;

    /**
     * @var float
     */
    public float $score;

    /**
     * @var float
     */
    public float $longitude;

    /**
     * @var float
     */
    public float $latitude;

    /**
     * @var int
     */
    public int $cities;

    /**
     * @var int
     */
    public int $totalNations;

    /**
     * @var string
     */
    public string $nationRankString;

    /**
     * @var int
     */
    public int $nationRank;

    /**
     * @var float
     */
    public float $approvalRating;

    /**
     * @var string
     */
    public string $ecoPolicy;

    /**
     * @var string
     */
    public string $title;

    /**
     * @var string
     */
    public string $leader;

    /**
     * @var string
     */
    public string $flagURL;

    /**
     * @var int
     */
    public int $aID;

    /**
     * @var int
     */
    public int $alliancePosition;

    /**
     * @var string
     */
    public string $alliance;

    /**
     * @var int
     */
    public int $age;

    /**
     * @var string
     */
    public string $founded;

    /**
     * @var string
     */
    public string $warPolicy;

    /**
     * @var string
     */
    public string $domesticPolicy;

    /**
     * @var string
     */
    public string $government;

    /**
     * @var array
     */
    public array $cityIDs = [];

    /**
     * @param int    $nID
     * @param Client $client
     * @throws GuzzleException
     * @throws PWAPIKeyExhausted
     * @throws PWAPIKeyInvalid
     * @throws NationDoesNotExist
     */
    public function __construct(int $nID, Client $client)
    {
        $this->nID = $nID;
        $this->client = $client;

        $json = $this->callAPI();

        if (! $this->checkIfNationExists($json))
            throw new NationDoesNotExist();

        $this->setupParams($json);
    }

    /**
     * @param stdClass $json
     * @return bool
     */
    protected function checkIfNationExists(\stdClass $json): bool
    {
        return $json->success;
    }

    /**
     * @return stdClass
     * @throws GuzzleException
     * @throws PWAPIKeyExhausted
     * @throws PWAPIKeyInvalid
     */
    protected function callAPI(): stdClass
    {
        return $this->client->getAPI("api/nation/id={$this->nID}");
    }

    /**
     * @param stdClass $json
     */
    protected function setupParams(stdClass $json)
    {
        foreach ($json->cityids as $cID)
            array_push($this->cityIDs, (int)$cID); // Convert the string of the ID to the actual int
        $this->cityProjectTimer = $json->cityprojecttimerturns;
        $this->nID = (int)$json->nationid;
        $this->name = $json->name;
        $this->preName = $json->prename;
        $this->continent = $json->continent;
        $this->socialPolicy = $json->socialpolicy;
        $this->color = $json->color;
        $this->minsInactive = $json->minutessinceactive;
        $this->uniqueID = $json->uniqueid;
        $this->government = $json->government;
        $this->domesticPolicy = $json->domestic_policy;
        $this->warPolicy = $json->war_policy;
        $this->founded = $json->founded;
        $this->age = $json->daysold;
        $this->alliance = $json->alliance;
        $this->alliancePosition = (int)$json->allianceposition;
        $this->aID = (int)$json->allianceid;
        $this->flagURL = $json->flagurl;
        $this->leader = $json->leadername;
        $this->title = $json->title;
        $this->ecoPolicy = $json->ecopolicy;
        $this->approvalRating = (float)$json->approvalrating;
        $this->nationRank = (int)$json->nationrank;
        $this->nationRankString = $json->nationrankstrings;
        $this->totalNations = $json->nrtotal;
        $this->cities = $json->cities;
        $this->latitude = (float)$json->latitude;
        $this->longitude = (float)$json->longitude;
        $this->score = (float)$json->score;
        $this->population = (int)$json->population;
        $this->gdp = (float)$json->gdp;
        $this->infra = (float)$json->totalinfrastructure;
        $this->land = $json->landarea;
        $this->soldiers = (int)$json->soldiers;
        $this->soldiersLost = (int)$json->soldiercasualties;
        $this->soldiersKilled = (int)$json->soldierskilled;
        $this->tanks = (int)$json->tanks;
        $this->tanksLost = (int)$json->tankcasualties;
        $this->tanksKilled = (int)$json->tankskilled;
        $this->aircraft = (int)$json->aircraft;
        $this->aircraftLost = (int)$json->aircraftcasualties;
        $this->aircraftKilled = (int)$json->aircraftkilled;
        $this->ships = (int)$json->ships;
        $this->shipsLost = (int)$json->shipcasualties;
        $this->shipsKilled = (int)$json->shipskilled;
        $this->missiles = (int)$json->missiles;
        $this->missilesLaunched = (int)$json->missilelaunched;
        $this->missilesEaten = (int)$json->missileseaten;
        $this->nukes = (int)$json->nukes;
        $this->nukesLaunched = (int)$json->nukeslaunched;
        $this->nukesEaten = (int)$json->nukeseaten;
        $this->infraDestroyed = (float)$json->infdesttot;
        $this->infraLost = (float)$json->infraLost;
        $this->moneyLooted = (float)$json->moneyLooted;
        $this->ironWorks = (bool)$json->ironworks;
        $this->bauxiteWorks = (bool)$json->bauxiteworks;
        $this->armsStockpile = (bool)$json->armsstockpile;
        $this->emgGasReserve = (bool)$json->emgasreserve;
        $this->massIrrigation = (bool)$json->massirrigation;
        $this->intTradeCenter = (bool)$json->inttradecenter;
        $this->missilePad = (bool)$json->missilelpad;
        $this->nuclearResFacility = (bool)$json->nuclearresfac;
        $this->ironDome = (bool)$json->irondome;
        $this->vitalDefSys = (bool)$json->vitaldefsys;
        $this->intelAgency = (bool)$json->intagncy;
        $this->uraniumEnrichment = (bool)$json->uraniumenrich;
        $this->propBureau = (bool)$json->propbureau;
        $this->cenCivEng = (bool)$json->cenciveng;
        $this->spaceProgram = (bool)$json->space_program;
        $this->spySat = (bool)$json->spy_satellite;
        $this->moonLanding = (bool)$json->moon_landing;
        $this->greenTech = (bool)$json->green_technologies;
        $this->telecomSat = (bool)$json->telecommunications_satellite;
        $this->recyclingInit = (bool)$json->recycling_initiative;
        $this->pirateEcon = (bool)$json->pirate_economy;
        $this->clinicalResCent = (bool)$json->clinical_research_center;
        $this->specialPoliceTrain = (bool)$json->specialized_police_training;
        $this->arableLand = (bool)$json->arable_land_agency;
        $this->advEngCorps = (bool)$json->adv_engineering_corps;
        $this->vMode = (int)$json->vmode;
        $this->offWars = (int)$json->offensivewars;
        $this->defWars = (int)$json->defensivewars;
        $this->offWarIDs = $json->offensivewar_ids;
        $this->defWarIDs = $json->defensivewar_ids;
        $this->beigeLeft = $json->beige_turns_left;
        $this->radiationIndex = (float)$json->radiation_index;
        $this->season = $json->season;
        $this->spyAvail = (bool)$json->espionage_available;
        $this->exists = true;
    }
}