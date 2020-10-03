<?php

$postBody = file_get_contents("php://input");
$postBody = json_decode($postBody);

// Path To Resource
if ($_GET['path'] == "") {
  // code...
  // Create Resource
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // code...

    // Response Codes
    // Entire Collection (e.g. /customers)
    // 201 (Created), 'Location' header with link to /customers/{id} containing new ID.
    http_response_code(201);
    // Specific Item (e.g. /customers/{id})
    // 404 (Not Found), 409 (Conflict) if resource already exists..
    http_response_code(404);
    http_response_code(409);
  }
  // Read Resource
  elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    // code...

      // Response Codes
      // Entire Collection (e.g. /customers)
      // 200 (OK), list of customers. Use pagination, sorting and filtering to navigate big lists.
      http_response_code(200);
      // Specific Item (e.g. /customers/{id})
      // 200 (OK), single customer. 404 (Not Found), if ID not found or invalid.
      http_response_code(200);
      http_response_code(404);
  }
  // Update/Replace Resource
  elseif ($_SERVER['REQUEST_METHOD'] == "PUT") {
    // code...

      // Response Codes
      // Entire Collection (e.g. /customers)
      // 405 (Method Not Allowed), unless you want to update/replace every resource in the entire collection.
      http_response_code(405);
      // Specific Item (e.g. /customers/{id})
      // 200 (OK) or 204 (No Content). 404 (Not Found), if ID not found or invalid.
      http_response_code(200);
      http_response_code(204);
      http_response_code(404);
  }
  // Update/Modify Resource
  elseif ($_SERVER['REQUEST_METHOD'] == "PATCH") {
    // code...

      // Response Codes
      // Entire Collection (e.g. /customers)
      // 405 (Method Not Allowed), unless you want to modify the collection itself.
      http_response_code(405);
      // Specific Item (e.g. /customers/{id})
      // 200 (OK) or 204 (No Content). 404 (Not Found), if ID not found or invalid.
      http_response_code(200);
      http_response_code(204);
      http_response_code(404);
  }
  // Delete Resource
  elseif ($_SERVER['REQUEST_METHOD'] == "DELETE") {
    // code...

      // Response Codes
      // Entire Collection (e.g. /customers)
      // 405 (Method Not Allowed), unless you want to delete the whole collection—not often desirable.
      http_response_code(405);
      // Specific Item (e.g. /customers/{id})
      // 200 (OK). 404 (Not Found), if ID not found or invalid.
      http_response_code(200);
      http_response_code(404);
  }
  //Anything Else
  else {
    // code...

      // Response Codes
      // 403 FORBIDDEN
      // Error code for when the user is not authorized to perform the operation or the resource is unavailable for some reason (e.g. time constraints, etc.).
      http_response_code(403);

  }

}

// References:
// https://www.restapitutorial.com/lessons/httpmethods.html
//
// Suggested usages for the "Top 10" HTTP Response Status Codes are as follows:
//
// 200 OK
// General success status code. This is the most common code. Used to indicate success.
// 201 CREATED
// Successful creation occurred (via either POST or PUT). Set the Location header to contain a link to the newly-created resource (on POST). Response body content may or may not be present.
// 204 NO CONTENT
// Indicates success but nothing is in the response body, often used for DELETE and PUT operations.
// 400 BAD REQUEST
// General error for when fulfilling the request would cause an invalid state. Domain validation errors, missing data, etc. are some examples.
// 401 UNAUTHORIZED
// Error code response for missing or invalid authentication token.
// 403 FORBIDDEN
// Error code for when the user is not authorized to perform the operation or the resource is unavailable for some reason (e.g. time constraints, etc.).
// 404 NOT FOUND
// Used when the requested resource is not found, whether it doesn't exist or if there was a 401 or 403 that, for security reasons, the service wants to mask.
// 405 METHOD NOT ALLOWED
// Used to indicate that the requested URL exists, but the requested HTTP method is not applicable. For example, POST /users/12345 where the API doesn't support creation of resources this way (with a provided ID). The Allow HTTP header must be set when returning a 405 to indicate the HTTP methods that are supported. In the previous case, the header would look like "Allow: GET, PUT, DELETE"
// 409 CONFLICT
// Whenever a resource conflict would be caused by fulfilling the request. Duplicate entries, such as trying to create two customers with the same information, and deleting root objects when cascade-delete is not supported are a couple of examples.
// 500 INTERNAL SERVER ERROR
// Never return this intentionally. The general catch-all error when the server-side throws an exception. Use this only for errors that the consumer cannot address from their end.



// Helper functions
?>
