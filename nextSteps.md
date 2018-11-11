next step 
    make a modal pops up whenever soneone that has liked a quote beofre try to liked the quote again  done


build the quote page showing all the details of the quotes including comments
    find the front end to use
    create a database table for commenrs
        id
        userid
        comment

        when saving push userid and comment to the database

        when retrieving comments selects from comment, userid, id, username, 
        

additional points -----loveQuote ajax page
    the ajax call made to the love quote can be simplfy by only passing in the userid and the quote id and the loveQuote ajax file
    can use the quoteid to find its authorid, and genres

    also there is no need in fetching details like genres and author and pushing it into quotelovers table
    when i want to check users intercation, i can simply find a function to give me genres and authors of a particular quotes

    this will go on and affect the profilepage cos it wont be able to fetch some stuffs from the quotelovers database as a fly 
    first get the quote id from the quotelover database
    then find the details of those quotes from the quote table using the quoteid

    in the profile page instead of fetchprofiledetails twice better to create to functions each doing two different things
    apparetnly it turn out that i do not two function doing thesame thing in the sense of profileinfo() and profiledetails()
