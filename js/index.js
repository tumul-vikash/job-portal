window.onload = getJobs;

async function getJobs() {
    const response = await fetch('http://localhost/job-portal-server/endpoints/jobs/read.php');
    const jobs = await response.json();
    console.log(jobs);
    jobs.forEach(job => {
        var jobContainer = document.createElement("DIV");
        jobContainer.classList.add("job-container");
        
        var title = document.createElement("H3");
        title.classList.add("text-primary");
        title.innerHTML = job.title;
        jobContainer.appendChild(title);

        var companyName = document.createElement("SPAN");
        companyName.innerHTML = job.company_name;
        jobContainer.appendChild(companyName);
        
        var extraData = document.createElement("DIV");
        extraData.classList.add("d-flex", "row", "justify-content-around", "extra-data");
        var author = document.createElement("P");
        author.innerHTML = job.author;
        var createdAt =  document.createElement("p");
        createdAt.innerHTML = job.created_at;
        extraData.appendChild(author);
        extraData.appendChild(createdAt);
        jobContainer.appendChild(extraData);

        var jd = document.createElement("P");
        jd.innerHTML = job.job_description;
        jobContainer.appendChild(jd);

        var btns = document.createElement("DIV");
        btns.classList.add("d-flex", "row", "justify-content-around");
        var btn1 = document.createElement("A");
        btn1.href = `/home/tumulvikash/development/web development/job-portal-demo/pages/apply.html?id=${job.id}&title=${job.title}`;
        btn1.classList.add("btn", "btn-primary");
        btn1.innerHTML = "Apply Now"
        btns.appendChild(btn1);
        var btn2 = document.createElement("BUTTON");
        btn2.classList.add("btn", "btn-warning");
        btn2.innerHTML = "Details";
        btns.appendChild(btn2);
        jobContainer.appendChild(btns);

        document.getElementById('all-jobs').appendChild(jobContainer);
    });
}