<?php
/**
 * Get the client
 */
require_once __DIR__ . '/vendor/autoload.php';

/**
 * Define configuration
 */

/* Username, password and endpoint used for server to server web-service calls */
Lyra\Client::setDefaultUsername("51447378");
Lyra\Client::setDefaultPassword("testpassword_6AfszrKgUUMmwuxkYM54oK7FRJuMITA94yhbQNFkndk03");
Lyra\Client::setDefaultEndpoint("https://api.micuentaweb.pe");

/* publicKey and used by the javascript client */
Lyra\Client::setDefaultPublicKey("51447378:testpublickey_3SNSOCewrXOZNL2oNYoixUO4q9RaBwClYyCIEofTLGs2g");

/* SHA256 key */
Lyra\Client::setDefaultSHA256Key("ZjbNRAlxT6FCG1UITWqr6gg9ukABNMoKozihudREXvIOI");