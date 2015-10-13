<div id=info>    
    <table border="1">
        <thead>
            <tr>
                <td>ID</td>
                <td>Username</td>
                <td>Age</td>
                <td>Point 1</td>
                <td>Point 2</td>
                <td>Point 3</td>
            </tr>
        </thead>
        <tbody>               
            {info}
            <tr>
                <td>{id}</td>
                <td>{name}</td>
                <td>{age}</td>  
                {result}
                    <td>{point1}</td>
                    <td>{point2}</td>
                    <td>{point3}</td>
                {/result}
            </tr>
            {/info}
        </tbody>
    </table>
</div>