package com.healthpatient.patientapp;

import android.os.AsyncTask;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.AutoCompleteTextView;
import android.widget.SearchView;

import com.healthpatient.patientapp.Utils.Constants;
import com.healthpatient.patientapp.Utils.URL1;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.ConnectException;
import java.net.HttpURLConnection;
import java.net.URL;
import java.net.UnknownHostException;
import java.util.ArrayList;
import java.util.LinkedHashMap;
import java.util.List;
import java.util.Map;

public class Donation extends AppCompatActivity {

    AutoCompleteTextView cityview,areaview;
    List<String[]> loginList;
    List<String[]> areaList;
    int city_id;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_donation);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        cityview=(AutoCompleteTextView) findViewById(R.id.city);
        areaview=(AutoCompleteTextView) findViewById(R.id.area);

        SearchTask searchTask=new SearchTask();
        searchTask.execute();
        cityview.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {

                city_id = Integer.parseInt(loginList.get(position)[0]);
                AreaTask areatask = new AreaTask(Integer.toString(city_id));
                areatask.execute();

            }
        });

    }
    public class SearchTask extends AsyncTask<Void, Void, String>
    {

        final String mlink;
        String error=null;
        HttpURLConnection conn;
        BufferedReader bufferedReader;

        SearchTask()
        {
            mlink = URL1.getCityURL();
        }
        @Override
        protected String doInBackground(Void... params) {

            try
            {
                URL url=new URL(mlink);
                Map<String,Object> param=new LinkedHashMap<String, Object>();



                conn=(HttpURLConnection)url.openConnection();
                conn.setDoOutput(true);
                conn.setDoInput(true);
                conn.setRequestMethod("POST");

                InputStream inputStream = conn.getInputStream();

                StringBuffer buffer = new StringBuffer();
                if(inputStream==null){
                    return "null_inputstream";
                }

                bufferedReader = new BufferedReader(new InputStreamReader(inputStream));

                String line ;

                while ( (line=bufferedReader.readLine())!=null ){
                    buffer.append(line + '\n');
                }

                if (buffer.length() == 0) {
                    return "null_inputstream";
                }

                String stringJSON = buffer.toString();
                Log.v("MyApp", "JSON retured in Attendance" + stringJSON);

                return stringJSON;

            } catch (UnknownHostException | ConnectException e) {
                error = "null_internet" ;
                e.printStackTrace();
            } catch (IOException e) {
                error= "null_file";
                e.printStackTrace();
            } finally {
                if ( conn!= null) {
                    conn.disconnect();
                }
                if (bufferedReader != null) {
                    try {
                        bufferedReader.close();
                    } catch (final IOException e) {
//                        Log.e(LOG_CAT, "ErrorClosingStream", e);
                    }
                }
            }

            return error;
        }
        @Override
        protected void onPostExecute(final String success) {
            addcityToAutoComplete(parsejson(success));

        }
    }
    public List<String[]> parsejson(String jsonResponse)
    {
        loginList = new ArrayList<String[]>();
        if (jsonResponse != null) {

            try {
                // Creating JSONObject from String
                JSONArray jsonObjMain = new JSONArray(jsonResponse);
                for(int i=0;i<=150;i++)
                {
                    String[] string=new String[2];
                    JSONObject city=jsonObjMain.getJSONObject(i);
                    string[0]=city.getString(Constants.CITY_ID);
                    string[1]=city.getString(Constants.CITY_NAME);

                    loginList.add(string);
                }



            } catch (JSONException e) {
                // TODO Auto-generated catch block
                e.printStackTrace();
            }

        }
        return loginList;
    }
    private void addcityToAutoComplete(List<String[]> cityAddressCollection) {
        //Create adapter to tell the AutoCompleteTextView what to show in its dropdown list.
        List<String> list=new ArrayList<String>();
        for(int i=0;i<cityAddressCollection.size();i++) {
            list.add(cityAddressCollection.get(i)[1]);
        }
        ArrayAdapter<String> adapter =
                new ArrayAdapter<>(Donation.this,
                        android.R.layout.simple_dropdown_item_1line,list);


        cityview.setAdapter(adapter);
    }

    public class AreaTask extends AsyncTask<Void, Void, String>
    {

        final String mlink;
        String error=null;
        HttpURLConnection conn;
        BufferedReader bufferedReader;

        AreaTask(String city_id)
        {
            mlink = URL1.getAreaURL(city_id);

        }
        @Override
        protected String doInBackground(Void... params) {

            try
            {
                URL url=new URL(mlink);
                Map<String,Object> param=new LinkedHashMap<String, Object>();



                conn=(HttpURLConnection)url.openConnection();
                conn.setDoOutput(true);
                conn.setDoInput(true);
                conn.setRequestMethod("POST");

                InputStream inputStream = conn.getInputStream();

                StringBuffer buffer = new StringBuffer();
                if(inputStream==null){
                    return "null_inputstream";
                }

                bufferedReader = new BufferedReader(new InputStreamReader(inputStream));

                String line ;

                while ( (line=bufferedReader.readLine())!=null ){
                    buffer.append(line + '\n');
                }

                if (buffer.length() == 0) {
                    return "null_inputstream";
                }

                String stringJSON = buffer.toString();
                Log.v("MyApp", "JSON retured in Attendance" + stringJSON);

                return stringJSON;

            } catch (UnknownHostException | ConnectException e) {
                error = "null_internet" ;
                e.printStackTrace();
            } catch (IOException e) {
                error= "null_file";
                e.printStackTrace();
            } finally {
                if ( conn!= null) {
                    conn.disconnect();
                }
                if (bufferedReader != null) {
                    try {
                        bufferedReader.close();
                    } catch (final IOException e) {
//                        Log.e(LOG_CAT, "ErrorClosingStream", e);
                    }
                }
            }

            return error;
        }
        @Override
        protected void onPostExecute(final String success) {
            addareaToAutoComplete(parsejson2(success));

        }
    }
    public List<String[]> parsejson2(String jsonResponse)
    {
        areaList = new ArrayList<String[]>();
        if (jsonResponse != null) {

            try {
                // Creating JSONObject from String
                JSONArray jsonObjMain = new JSONArray(jsonResponse);
                for(int i=0;i<=118;i++)
                {
                    String[] string=new String[2];
                    JSONObject area=jsonObjMain.getJSONObject(i);
                    string[0]=area.getString(Constants.CITY_ID);
                    string[1]=area.getString(Constants.CITY_NAME);
                    areaList.add(string);
                }



            } catch (JSONException e) {
                // TODO Auto-generated catch block
                e.printStackTrace();
            }

        }
        return areaList;
    }
    private void addareaToAutoComplete(List<String[]> emailAddressCollection) {
        //Create adapter to tell the AutoCompleteTextView what to show in its dropdown list.
        List<String> list=new ArrayList<String>();
        for(int i=0;i<emailAddressCollection.size();i++) {
            list.add(emailAddressCollection.get(i)[1]);
        }
        ArrayAdapter<String> adapter =
                new ArrayAdapter<>(Donation.this,
                        android.R.layout.simple_dropdown_item_1line, list);

        areaview.setAdapter(adapter);
    }

}
