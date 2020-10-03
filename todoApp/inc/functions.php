<?php
//application functions

function get_due_list()
{
  include 'connection.php';
  try {
    return $db->query('SELECT due,deadline,id FROM tasks');
  } catch (Exception $e)
  {
    echo "Error!: " . $e->getMessage() . "</br>";
    return array();
  }
}

//function for getting(CRUD READ) categories list
function get_category_list()
{
  include 'connection.php';
  try
  {
    return $db->query('SELECT category_id, title FROM categories');
  } catch (Exception $e)
  {
    echo "Error!: " . $e->getMessage() . "</br>";
    return array();
  }
}

//function for getting (CRUD READ) task list
function get_task_list($filter = null)
{

  include 'connection.php';

  $sql = "SELECT tasks.*, categories.title as category FROM tasks ";
  $sql .= "JOIN categories ON tasks.category_id = categories.category_id ";
  //$sql .= " JOIN users ON tasks.id = users.id";
  $where = '';

  if (is_array($filter))
  {
    switch ($filter[0])
    {
      case 'due':
      $where = ' WHERE due = ?';
      break;
      case 'category':
      $where = ' WHERE categories.title = ?';
      break;
      case 'date':
      $where = ' WHERE date >= ? AND date <= ?'; //look at this
      break;
      case 'deadline';
      $where = ' WHERE deadline = ?';
      break;
    }
  }

  $orderBy = ' ORDER BY due ASC';
  if ($filter)
  {
    $orderBy = ' ORDER BY due ASC, date DESC';  //this is what keeps dates within its group
  }

  try
  {
    $results =  $db->prepare($sql . $where . $orderBy);
    if (is_array($filter))
    {
      $results->bindValue(1, $filter[1]);
      if ($filter[0] == 'date')
      {
        $results->bindValue(2, $filter[2], PDO::PARAM_STR);
      }

    }
    $results->execute();
  } catch (Exception $e)
  {
    echo "Error!: " . $e->getMessage() . "</br>";
    return array();
  }
  return $results->fetchAll(PDO::FETCH_ASSOC);
  $encode_id = base64_encode("encodeuserid{$id}");
}


//function (CRUD CREATE) new category

function add_category($title, $category_id= null)
{
  include 'connection.php';
  if($category_id)
  {
    $sql = 'UPDATE categories SET title = ? WHERE category_id = ?';
  } else {
    $sql = 'INSERT INTO categories(title) VALUES (?)';
  }

  try {
    $results = $db->prepare($sql);
    $results->bindValue(1, $title, PDO::PARAM_STR);

    if($category_id)
    {
      $results->bindValue(2, $category_id, PDO::PARAM_INT);
    }

    $results->execute();
  } catch (Exception $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    return false;
  }
  return true;
}

//function get category

function get_category($category_id)
{
  include 'connection.php';
  $sql = 'SELECT * FROM categories WHERE category_id = ?';

  try {
    $results = $db->prepare($sql);
    $results->bindValue(1, $category_id, PDO::PARAM_INT);
    $results->execute();
  } catch (Exception $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    return false;
  }
  return $results->fetch();
}

//function get task
function get_task($task_id)
{
  include 'connection.php';
  $sql = 'SELECT task_id, title, date, description, deadline, requested, category_id, due, comment FROM tasks WHERE task_id = ?';

  try {
    $results = $db->prepare($sql);
    $results->bindValue(1, $task_id, PDO::PARAM_INT);
    $results->execute();
  } catch (Exception $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    return false;
  }
  return $results->fetch();
}

// function delete task
function delete_task($task_id)
{
  include 'connection.php';
  $sql = 'DELETE FROM tasks WHERE task_id = ?';

  try {
    $results = $db->prepare($sql);
    $results->bindValue(1, $task_id, PDO::PARAM_INT);
    $results->execute();
  } catch (Exception $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    return false;
  }
  return true;
}

//function delete category
function delete_category($category_id)
{
  include 'connection.php';
  $sql = 'DELETE FROM categories WHERE category_id = ?'
  . ' AND category_id NOT IN (SELECT category_id FROM tasks)' ;

  try {
    $results = $db->prepare($sql);
    $results->bindValue(1, $category_id, PDO::PARAM_INT);
    $results->execute();
  } catch (Exception $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    return false;
  }
  if ($results->rowCount() > 0)
  {
    return true;
  } else {
    return false;
  }

}

function clear_form($task_id)
{
  include 'connection.php';

    $sql = 'UPDATE tasks SET comment = NULL, checkboxAns = 0 ' . ' WHERE task_id = ?';

  try
  {
    $results = $db->prepare($sql);
    $results->bindValue(1, $task_id, PDO::PARAM_INT);
    $results->execute();

  } catch (Exception $e)
  {
    echo "Error!: " . $e->getMessage() . "<br />";
    return false;
  }
  return true;
  }



function update_description($description, $task_id)
{
  include 'connection.php';
  if ($task_id)
  {
    $sql = 'UPDATE tasks SET description = ? ' . ' WHERE task_id = ?';

  try
  {
    $results = $db->prepare($sql);
    $results->bindValue(1,$description, PDO::PARAM_STR);
    $results->bindValue(2, $task_id, PDO::PARAM_INT);
    $results->execute();

  } catch (Exception $e)
  {
    echo "Error!: " . $e->getMessage() . "<br />";
    return false;
  }
  return true;
  }
  }

function update_comment($comment,$checkboxAns, $task_id)
{
  include 'connection.php';
  if ($task_id)
  {
    $sql = 'UPDATE tasks SET comment = ?, checkboxAns = ? ' . ' WHERE task_id = ?';

  try
  {
    $results = $db->prepare($sql);
    $results->bindValue(1,$comment, PDO::PARAM_STR);
    $results->bindValue(2, $checkboxAns, PDO::PARAM_INT);
    $results->bindValue(3, $task_id, PDO::PARAM_INT);
    $results->execute();

  } catch (Exception $e)
  {
    echo "Error!: " . $e->getMessage() . "<br />";
    return false;
  }
  return true;
  }
  }

  //function add task - CREATE
  function add_task($category_id,$title,$date,$description, $deadline, $requested,  $due, $comment, $user_id, $task_id = null)
  {
    include 'connection.php';
    if($task_id)
    {
      $sql = 'UPDATE tasks SET category_id = ?, title = ?, date = ?, description = ?, deadline = ?, requested = ?, due = ?, comment = ?, id = ? '
      . ' WHERE task_id = ?';
    } else {
      $sql = 'INSERT INTO tasks(category_id, title, date, description, deadline, requested, due, comment, id) VALUES (?,?,?,?,?,?,?,?,?)';
    }

    try {
      $results = $db->prepare($sql);
      $results->bindValue(1, $category_id, PDO::PARAM_INT);
      $results->bindValue(2, $title, PDO::PARAM_STR);
      $results->bindValue(3, $date, PDO::PARAM_STR);
      $results->bindValue(4, $description, PDO::PARAM_STR);
      $results->bindValue(5, $deadline, PDO::PARAM_STR);
      $results->bindValue(6, $requested, PDO::PARAM_STR);
      $results->bindValue(7, $due, PDO::PARAM_STR);
      $results->bindValue(8, $comment, PDO::PARAM_STR);
      $results->bindValue(9, $user_id, PDO::PARAM_INT);

      if($task_id)
      {
        $results->bindValue(10, $task_id, PDO::PARAM_INT);
      }

      $results->execute();
    } catch (Exception $e) {
      echo "Error!: " . $e->getMessage() . "<br />";
      return false;
    }
    return true;
  }

  //function register user
  function add_user($department,$userlogin,$hashed_password)
  {
    include 'connection.php';

      $sql = "INSERT INTO users(department, userlogin, password, join_date) VALUES (?,?,?,date())";


    try {
      $results = $db->prepare($sql);
      $results->bindValue(1, $department, PDO::PARAM_STR);
      $results->bindValue(2, $userlogin, PDO::PARAM_STR);
      $results->bindValue(3, $hashed_password, PDO::PARAM_STR);
      $results->execute();


    } catch (Exception $e) {
      echo "Error!: " . $e->getMessage() . "<br />";
      return false;
    }
    return true;
  }


  //function checking the login credentials
   function check_login($user,  $password)
  {
    include "connection.php";
    $sql = "SELECT * FROM users WHERE userlogin = ?";
    $results = $db->prepare($sql);
    $results->bindValue(1, $user, PDO::PARAM_STR);
    $results->execute();

    while($row = $results->fetch())
    {
      $id = $row["id"];
      $hashed_password = $row["password"];
      $userlogin = $row["userlogin"];

      if(password_verify($password, $hashed_password))
      {
        $_SESSION["id"] = $id;
        $_SESSION["userlogin"] = $userlogin;
        ?>
        <script>
        window.location = "/todoApp/index.php";
        </script>
        <?php
      } else {
        echo "<p class='alert alert-warning' role='alert'>Invalid userlogin or password</p>";
      }
    }
  }


  //list all users for admin
  function listUsers()
  {
    include 'connection.php';
    try {
      return $db->query('SELECT * FROM users');
    } catch (Exception $e)
    {
      echo "Error!: " . $e->getMessage() . "</br>";
      return array();
    }

  }
