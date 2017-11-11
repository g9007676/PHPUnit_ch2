#!/usr/bin/env bash

# more bash-friendly output for jq
JQ="jq --raw-output"

create_dep() {
    if dep=$(aws deploy create-deployment --application-name deploy --s3-location bucket=zheyu-code,key=master-"$CIRCLE_SHA1",bundleType=zip --deployment-group-name test | \
            $JQ ".deploymentId"); then
        echo "$dep"
    else
        echo "Failed to deployment"
        return 1
    fi

    for attempt in $(seq 1 30)
    do
        stale=$(aws deploy get-deployment --deployment-id "$dep" | $JQ ".deploymentInfo.status")
        if [ "$stale" != "Succeeded" ]
        then
            echo "Waiting for stale deployments:"
            echo "$stale"
            sleep 5
        else
            echo "Deployed!"
            return 0
        fi
    done

    return 1
}

create_dep