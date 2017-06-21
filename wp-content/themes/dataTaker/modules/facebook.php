<?php
class FacebookConnect
{

  private $fb;
  private $fb_code;
  private $fbApp;
  private $helper;
  private $permissions;
  public $user_id;
  public $user_picture;
  public $user_name;
  public $user_birthday;
  public $user_email;
  public $user_education;
  public $user_work;
  public $user_interested_in;
  public $user_music;
  public $user_movies;
  public $user_sports;
  public $user_cover;
  public $user_location;
  public $user_tagged_places;
  public $user_hometown;
  public $user_family;
  public $user_relationship_status;
  public $user_photos;
  private $accessToken;
  public $user_points = 0;


  function __construct()
  {
    require_once __DIR__ . '/../libs/Facebook/autoload.php';
    $this->fb = new Facebook\Facebook([ 'app_id' => '', 'app_secret' => '', 'default_graph_version' => 'v2.5']);
    if( $this->getFacebookAccessToken() )
    {
      $this->getMe();
      $fbApp = new Facebook\FacebookApp('', '');
    }

  }
  public function getLoginButton()
  {

    $this->helper = $this->fb->getRedirectLoginHelper();
    $this->permissions = ['user_likes', 'email', 'user_location', 'user_relationships', 'user_tagged_places', 'user_work_history', 'user_education_history', 'user_actions.books', 'user_actions.fitness', 'user_actions.music', 'user_birthday', 'user_photos', 'user_posts', 'user_status'];
    //$this->permissions = ['email', 'user_posts', 'user_status'];
    return $this->helper->getLoginUrl(home_url('te-tengo/'), $this->permissions);

  }

  public function setFacebookAccessToken()
  {

    $this->helper = $this->fb->getRedirectLoginHelper();
    try {

      $accessToken = $this->helper->getAccessToken();

    } catch(Facebook\Exceptions\FacebookResponseException $e) {

      // When Graph returns an error

      //echo 'Graph returned an error: ' . $e->getMessage();
      //exit;

    } catch(Facebook\Exceptions\FacebookSDKException $e) {

      // When validation fails or other local issues
      //echo 'Facebook SDK returned an error: ' . $e->getMessage();
      //exit;

    }

    if (isset($accessToken)) {
      // Logged in!
      $_SESSION['facebook_access_token'] = (string) $accessToken;
      $this->accessToken = $_SESSION['facebook_access_token'];

    }

  }

  public function getFacebookAccessToken()
  {

    if( isset( $_SESSION['facebook_access_token'] ) )
    {

      return $_SESSION['facebook_access_token'];

    } else {

      return false;

    }

  }

  private function getMe()
  {
    $this->fb->setDefaultAccessToken( $this->getFacebookAccessToken() );

    try {
      $response = $this->fb->get('/me?fields=id,picture,name,birthday,email,education,work,interested_in,music,movies,sports,cover,location,tagged_places,hometown,family,relationship_status,photos', $this->accessToken);
      //$response = $this->fb->get('/me?fields=id,name,picture', $this->accessToken);
      $userNode = $response->getGraphUser();
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
      // When Graph returns an error
      //echo 'Graph returned an error: ' . $e->getMessage();
      //exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
      // When validation fails or other local issues
      //echo 'Facebook SDK returned an error: ' . $e->getMessage();
      //exit;
    }

    //  echo '<h1>';
    //  var_dump( $userNode['cover']['source'] );
    //  echo '</h1>';

    $this->setUserData( $userNode );
    return $userNode;

  }

  public function getUserPictureURL()
  {
    try {
      //$response = $this->fb->get('/me?fields=picture&type=large&redirect=false', $this->accessToken);
      $response = $this->fb->get('/me?fields=picture.width(120)', $this->accessToken);
      $picture = $response->getGraphUser();
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
      // When Graph returns an error
      //echo 'Graph returned an error: ' . $e->getMessage();
      //exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
      // When validation fails or other local issues
      //echo 'Facebook SDK returned an error: ' . $e->getMessage();
      //exit;
    }

    return $picture['picture']['url'];

  }

  public function getLastSchoolName()
  {

    $number_schools = count( $this->user_education ) - 1;
    return $this->user_education[$number_schools]['school']['name'];

  }

  public function getLastWorkName()
  {

    return $this->user_work[0]['employer']['name'];

  }

  public function getLastMusicName()
  {

    return $this->user_music[0]['name'];

  }

  public function getLastMovieName()
  {
    return $this->user_movies[0]['name'];

  }

  public function getLastSportName()
  {
    return null;

  }

  public function getUserTaggedPlaces( $num_places )
  {

    $return = array();
    foreach ($this->user_tagged_places as $value) {

      $return = '';
      if( !empty( $value['place']['location']['street'] ) )
      {
        $return .= $value['place']['location']['street'] . ', ';
      }
      $return .= $value['place']['location']['city'];

    }

    return $return;

  }

  public function getUserTaggedPlacesCoordinates()
  {

    $return = array();
    foreach ($this->user_tagged_places as $value)
    {

      $return[] = array(
        'lat' => $value['place']['location']['latitude'],
        'lon' => $value['place']['location']['longitude']
      );

    }

    return $return;

  }

  private function setUserData( $userNode )
  {

    $this->setUserId( $userNode );
    $this->setUserName( $userNode );
    $this->setUserBirthday( $userNode );
    $this->setUserPicture( $userNode );
    $this->setUserCover( $userNode );
    $this->setUserEmail( $userNode );
    $this->setUserEducation( $userNode );
    $this->setUserWork( $userNode );
    $this->setUserInterested_in( $userNode );
    $this->setUserMusic( $userNode );
    $this->setUserMovies( $userNode );
    $this->setUserSports( $userNode );
    $this->setUserCover( $userNode );
    $this->setUserLocation( $userNode );
    $this->setUserTaggedPlaces( $userNode );
    $this->setUserTaggedPhotos( $userNode );
    $this->setUserHometown( $userNode );
    $this->setUserFamily( $userNode );
    $this->setUserRelaionshipStatus( $userNode );
    $this->setUserPhotos( $userNode );

  }

  private function setUserId( $userNode ) { $this->user_id = $userNode['id']; }
  private function setUserName( $userNode ) { $this->user_name = $userNode['name']; }
  private function setUserBirthday( $userNode ) { $this->user_birthday = ( isset( $userNode['birthday'] ) ) ? $userNode['birthday']->format('d-m-Y') : date('d-m-Y'); }
  public function setUserPicture( $userNode ) { $this->user_picture = $userNode['picture']; }
  public function setUserCover( $userNode ) { $this->user_cover = $userNode['cover']['source']; }
  public function setUserEmail( $userNode ) { $this->user_email = $userNode['email']; }
  public function setUserEducation( $userNode ) { $this->user_education = $userNode['education']; }
  public function setUserWork( $userNode ) { $this->user_work = $userNode['work']; }
  public function setUserInterested_in( $userNode ) { $this->user_interested_in = $userNode['interested_in']; }
  public function setUserMusic( $userNode )
  {
    $request = $this->fb->request('GET', '/' . $this->user_id . '/music');

    try {
      $response = $this->fb->getClient()->sendRequest($request);
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
      // When Graph returns an error
      //echo 'Graph returned an error: ' . $e->getMessage();
      //exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
      // When validation fails or other local issues
      //echo 'Facebook SDK returned an error: ' . $e->getMessage();
      //exit;
    }
    $this->user_music = $response->getGraphEdge();

  }
  public function setUserMovies( $userNode )
  {
    $request = $this->fb->request('GET', '/' . $this->user_id . '/movies');

    try {
      $response = $this->fb->getClient()->sendRequest($request);
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
      // When Graph returns an error
      //echo 'Graph returned an error: ' . $e->getMessage();
      //exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
      // When validation fails or other local issues
      //echo 'Facebook SDK returned an error: ' . $e->getMessage();
      //exit;
    }
    $this->user_movies = $response->getGraphEdge();
  }
  public function setUserSports( $userNode )
  {

    $request = $this->fb->request('GET', '/sports');

    try {
      $response = $this->fb->getClient()->sendRequest($request);
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
      // When Graph returns an error
      //echo 'Graph returned an error: ' . $e->getMessage();
      //exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
      // When validation fails or other local issues
      //echo 'Facebook SDK returned an error: ' . $e->getMessage();
      //exit;
    }
    //$this->user_sports = $response->getGraphNode();

  }

  public function getUserPhotos()
  {

    $request = $this->fb->request( 'GET', '/' . $this->user_id . '/photos?fields=images' );

    try {
      $response = $this->fb->getClient()->sendRequest($request);
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
      // When Graph returns an error
      //echo 'Graph returned an error: ' . $e->getMessage();
      //exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
      // When validation fails or other local issues
      //echo 'Facebook SDK returned an error: ' . $e->getMessage();
      //exit;
    }
    $graphObject = $response->getGraphEdge();
    return $graphObject;

  }

  public function setUserLocation( $userNode ) { $this->user_location = $userNode['location']; }
  public function setUserTaggedPhotos( $userNode ) { $this->user_photos = $userNode['tagged_photos']; }
  public function setUserTaggedPlaces( $userNode ) { $this->user_tagged_places = $userNode['tagged_places']; }
  public function setUserHometown( $userNode ) { $this->user_hometown = $userNode['hometown']; }
  public function setUserFamily( $userNode ) { $this->user_family = $userNode['family']; }
  public function setUserRelaionshipStatus( $userNode ) { $this->user_relationship_status = $userNode['relationship_status']; }
  public function setUserPhotos( $userNode ) { $this->user_photos = $userNode['photos']; }

  public function get_user_points()
  {
    //var_dump( $this->user_family );
    $is_tagged = $this->getUserTaggedPlaces(1);
    $this->user_points += ( !empty( $this->user_location ) ) ? 10 : 0;
    $this->user_points += ( !empty( $is_tagged ) ) ? 8 : 0;
    $this->user_points += ( !empty( $this->user_work ) ) ? 6 : 0;
    $this->user_points += ( !empty( $this->user_education ) ) ? 5 : 0;
    $this->user_points += ( !empty( $this->user_music ) || !empty( $this->user_movies ) ) ? 4 : 0;
    $this->user_points += ( !empty( $this->user_picture ) ) ? 3 : 0;
    $this->user_points += ( !empty( $this->user_name ) ) ? 2 : 0;
    $this->user_points += ( !empty( $this->user_birthday ) ) ? 1 : 0;
    //39

    return ( ( $this->user_points * 100 ) / 39 );

  }

}
