<?php


namespace ECommerce;


class UsersController extends Controller {


    public function __construct(Site $site, User $user, array $post) {
        parent::__construct($site);


    }

}