<?php
App::uses('UserMetum', 'Model');

/**
 * UserMetum Test Case
 *
 */
class UserMetumTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_metum',
		'app.user',
		'app.client',
		'app.project',
		'app.project_metum',
		'app.tag',
		'app.projects_tag',
		'app.group',
		'app.projects_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserMetum = ClassRegistry::init('UserMetum');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserMetum);

		parent::tearDown();
	}

}
