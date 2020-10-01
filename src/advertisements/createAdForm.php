<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/createAdForm.css" />
    <title>Create an advertisement</title>
</head>

<body>
    <h1 align="center">Enter the Advertisement Details</h1>
    <form method="post">
        <table align="center">
            <tr>
                <td>
                    Enter the title
                </td>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td>
                    Select the category
                </td>
                <td>
                    <select>
                        <option>
                            Graphics Designing
                        </option>
                        <option>
                            Programming
                        </option>
                        <option>
                            Content Writing
                        </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Upload an image
                </td>
                <td>
                    <label class="custom-file-upload">
                        <input type="file" />
                        Browse
                    </label> &nbsp &nbsp
                    <input type='submit' value='Upload' name='but_upload'>
                </td>
            </tr>
            <tr>
                <td>
                    Advertisement Status
                </td>
                <td>
                    Inactive <input type="checkbox"> Active <input type="checkbox">
                </td>
            </tr>
            <tr>
                <td>
                    Enter a search tag
                </td>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td>
                    Advertisement Content
                </td>
                <td>
                    <textarea></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Enter your email
                </td>
                <td>
                    <input type="email" id="email" name="email">
                </td>
            </tr>

            <tr>
                <td>
                    <h3>Add collaborators to the advertisement </h3>
                    <h5>Enter the EXL Exchange username of each member</h5>
                </td>

            </tr>

            <tr>
                <td>
                    Group member 01
                </td>
                <td>
                    <input type="text">
                </td>
            </tr>

            <tr>
                <td>
                    Group member 02
                </td>
                <td>
                    <input type="text">
                </td>
            </tr>

            <tr>
                <td>
                    Group member 03
                </td>
                <td>
                    <input type="text">
                </td>
            </tr>
        </table>
    </form>


</body>

</html>